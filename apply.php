<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A government agency enhancing its IT and digital services">
    <meta name="author" content="Julien Ambrose, Kashfia Rahman, Tamim Ahmed, Khaled Rafid">
    <title>Apply Here</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <!-- Company Header -->
    <?php
    include 'Inc_Files/header.inc';
    ?>

    <div class="formContainer">
        <h1>Job Application Form</h1>
        <form action="https://mercury.swin.edu.au/it000000/formtest.php" method="POST">
            <div class="formGroup">
                <label for="JobReferenceNum" class="required">Job Reference Number</label>
                <input type="text" id="JobReferenceNum" name="JobReferenceNum" required>
            </div>

            <div class="formRow">
                <div class="formGroup">
                    <label for="FirstName" class="required">First Name</label>
                    <input type="text" id="FirstName" name="FirstName" maxlength="20" required>
                </div>

                <div class="formGroup">
                    <label for="LastName" class="required">Last Name</label>
                    <input type="text" id="LastName" name="LastName" maxlength="20" required>
                </div>
            </div>

            <div class="formGroup">
                <label for="DateOfBirth" class="required">Date of Birth</label>
                <input type="date" id="DateOfBirth" name="DateOfBirth" required>
            </div>

            <div class="formGroup">
                <label class="required">Gender</label>
                <div class="radioGroup">
                    <div class="radioOption">
                        <input type="radio" id="GenderMale" name="Gender" value="Male" required>
                        <label for="GenderMale">Male</label>
                    </div>
                    <div class="radioOption">
                        <input type="radio" id="GenderFemale" name="Gender" value="Female" required>
                        <label for="GenderFemale">Female</label>
                    </div>
                    <div class="radioOption">
                        <input type="radio" id="GenderOther" name="Gender" value="Other" required>
                        <label for="GenderOther">Other</label>
                    </div>
                </div>
            </div>

            <div class="formGroup">
                <label for="Address" class="required">Address</label>
                <input type="text" id="Address" name="Address" required>
            </div>

            <div class="formRow">
                <div class="formGroup">
                    <label for="suburb" class="required">Suburb</label>
                    <input type="text" id="suburb" name="suburb" required>
                </div>

                <div class="formGroup">
                    <label for="State" class="required">State</label>
                    <select id="State" name="State" required>
                        <option value="" disabled selected>Select your state</option>
                        <option value="VIC">VIC</option>
                        <option value="NSW">NSW</option>
                        <option value="QLD">QLD</option>
                        <option value="NT">NT</option>
                        <option value="WA">WA</option>
                        <option value="SA">SA</option>
                        <option value="TAS">TAS</option>
                        <option value="ACT">ACT</option>
                    </select>
                </div>

                <div class="formGroup">
                    <label for="Postcode" class="required">Postcode</label>
                    <input type="text" id="Postcode" name="Postcode" required>
                </div>
            </div>

            <div class="formGroup">
                <label for="email" class="required">Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="formGroup">
                <label for="PhoneNumber" class="required">Phone Number</label>
                <input type="text" id="PhoneNumber" name="PhoneNumber" required>
            </div>

            <div class="formGroup">
                <label>Skills</label>
                <div class="checkboxGroup">
                    <input type="checkbox" id="Skill1" name="SkillList[]" value="Programming">
                    <label for="Skill1">Programming</label>
                </div>
                <div class="checkboxGroup">
                    <input type="checkbox" id="Skill2" name="SkillList[]" value="Design">
                    <label for="Skill2">Design</label>
                </div>
                <div class="checkboxGroup">
                    <input type="checkbox" id="Skill3" name="SkillList[]" value="Communication">
                    <label for="Skill3">Communication</label>
                </div>
                <div class="checkboxGroup">
                    <input type="checkbox" id="Skill4" name="SkillList[]" value="Problem Solving">
                    <label for="Skill4">Problem Solving</label>
                </div>
            </div>

            <div class="formGroup">
                <label for="OtherSkills">Other Skills</label>
                <textarea id="OtherSkills" name="OtherSkills"
                    placeholder="Enter any other skills you have..."></textarea>
            </div>

            <button type="submit" class="submitBtn">Submit Application</button>

            <p class="formNote">Fields marked with * are required</p>
        </form>
    </div>
    <?php
    include 'Inc_Files/footer.inc';
    ?>
</body>

</html>