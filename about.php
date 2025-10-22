<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A government agency enhancing its IT and digital services">
    <meta name="author" content="Julien Ambrose, Kashfia Rahman, Tamim Ahmed, Khaled Rafid">
    <title>About Us</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <?php
    include 'Inc_Files/header.inc';
    ?>

    <main class="content">
        <section>
            <h2>Class details</h2>
            <ul>
                <li><strong>Group name:</strong> Site Squad (G06)</li>
                <li><strong>Class day/time:</strong>
                    <ul>
                        <li><strong>Day:</strong> Thursday</li>
                        <li><strong>Time:</strong> 2:00–4:00 PM AEST</li>
                    </ul>
                </li>
            </ul>
        </section>

        <section>
            <h2>Member contributions and quotes</h2>
            <ul id="memberList">
                <li>Julien Ambrose</li>
                <li><strong>Contribution:</strong> Worked on the CSS and Apply page</li>

                <li>Kashfia Rahman</li>
                <li><strong>Contribution:</strong>Worked on the Index Page</li>

                <li>Tamim Rahman</li>
                <li><strong>Contribution:</strong>Jobs Page and Images</li>

                <li>Khaled Mostafa Rafid</li>
                <li><strong>Contribution:</strong>Worked on the About page</li>
            </ul>
        </section>

        <?php
            include_once("settings.php");
            $conn = @mysqli_connect($host, $user, $password, $sql_db);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $createMembersTable = "CREATE TABLE IF NOT EXISTS members (
                fname VARCHAR(30) NOT NULL,
                lname VARCHAR(30) NOT NULL,
                project_1_contribution VARCHAR(255) NOT NULL,
                project_2_contribution VARCHAR(255) NOT NULL
                )";

                if ($conn->query($createMembersTable) === TRUE) {
                    echo "Table created successfully or already exists";
                } else {
                    echo "Error creating table: " . $conn->error;
                }

            $conn->close();
            ?>

        <div style="margin-top: 24px;">
            <section>
                <div class="tableContainer">
                    <table>
                        <caption>About the team</caption>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Dream job</th>
                                <th>Coding snack</th>
                                <th>Hometown</th>
                                <th>Wildcard hobby</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Rafid</td>
                                <td>Real Estate Business</td>
                                <td>Cardamon chai</td>
                                <td>Jashore</td>
                                <td>Singing</td>
                            </tr>
                            <tr>
                                <td>Julien</td>
                                <td>Full Stack Developer</td>
                                <td>Banana</td>
                                <td>Melbourne</td>
                                <td>Sound Engineer and producer</td>
                            </tr>
                            <tr>
                                <td>Kashfia</td>
                                <td>Working in AI related field</td>
                                <td>Coffee</td>
                                <td>Chittagong</td>
                                <td>Cooking and listening to music</td>
                            </tr>
                            <tr>
                                <td>Tamim</td>
                                <td>UX writer for public health</td>
                                <td>Dried mango</td>
                                <td>Dhaka</td>
                                <td>Miniature dioramas</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>

        <h2>Group photo</h2>
        <figure>
        </figure>
    </main>

    <?php
    include 'Inc_Files/footer.inc';
    ?>

</body>

</html>