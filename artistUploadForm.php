<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />

    <title>Art Upload Form</title>
    <style>
        body{
            background: url('background.jpeg') no-repeat;
            background-size:cover;
            background-position: center;
            backdrop-filter: blur(10px);
        }
        .heading {
            text-align: center;
            margin-bottom: 20px;
            color: black;
        }
        .form-label {
            color: black; 
            font-size: 18px;
        }
        #other-type-input {
            display: none;
        }
    </style>
  </head>
  <body>
    <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8 m-5">
            <form class="row shadow-lg p-3 needs-validation" action="artUpload.php" method="post" enctype="multipart/form-data" novalidate>
              <div class="heading">
                <h1 class="">UPLOAD ART DETAILS</h1>
              </div>
              <!-- Artist Username -->
              <div class="col-md-12 m-2">
                <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $_SESSION['username']; ?>" readonly />
                <div class="valid-feedback">Username validated</div>
                <div class="invalid-feedback">Please enter a valid Username</div>
              </div>
              <!-- Art Name -->
              <div class="col-md-12 m-2">
                <label for="art-name" class="form-label">Art Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Art Name" id="art-name" name="art_name" required />
                <div class="valid-feedback">Art Name validated</div>
                <div class="invalid-feedback">Please enter a valid Art Name</div>
              </div>
              <!-- Description -->
              <div class="col-md-12 m-2">
                <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                <textarea class="form-control" placeholder="Description" id="description" name="description" cols="30" rows="5" required></textarea>
                <div class="valid-feedback">Description validated</div>
                <div class="invalid-feedback">Please enter a description</div>
              </div>
              <!-- Date -->
              <div class="col-md-12 m-2">
                <label for="date" class="form-label">Date <span class="text-danger">*</span></label>
                <input type="date" class="form-control" id="date" name="date" required />
                <div class="valid-feedback">Date validated</div>
                <div class="invalid-feedback">Please enter a valid date</div>
              </div>
              <!-- Type of Art -->
              <div class="col-md-12 m-2">
                <label for="type-of-art" class="form-label">Type of Art <span class="text-danger">*</span></label>
                <select class="form-select" id="type-of-art" name="type_of_art" required>
                  <option value="" selected disabled>Select Type of Art</option>
                  <option value="sculpture">Sculpture</option>
                  <option value="painting">Painting</option>
                  <option value="print">Print</option>
                  <option value="scripture">Scripture</option>
                  <option value="digital">Digital Art</option>
                  <option value="photography">Photography</option>
                  <option value="other">Other</option>
                </select>
                <div class="valid-feedback">Type of Art validated</div>
                <div class="invalid-feedback">Please select a Type of Art</div>
              </div>
              <!-- Other Type of Art -->
              <div class="col-md-12 m-2" id="other-type-input">
                <label for="other-type" class="form-label">Please specify <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="other-type" name="other_type" placeholder="Specify type of art" />
                <div class="valid-feedback">Other type validated</div>
                <div class="invalid-feedback">Please specify the type of art</div>
              </div>
              <!-- Picture Upload -->
              <div class="col-md-12 m-2">
                <label for="picture" class="form-label">Upload Picture <span class="text-danger">*</span></label>
                <input type="file" class="form-control" id="picture" name="picture" accept="image/*" required />
                <div class="valid-feedback">Picture validated</div>
                <div class="invalid-feedback">Please upload a picture of your art</div>
              </div>
              <!-- Price -->
              <div class="col-md-12 m-2">
                <label for="price" class="form-label">Price <span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="price" name="price" placeholder="Price" min="0" step="0.01" required />
                <div class="valid-feedback">Price validated</div>
                <div class="invalid-feedback">Please enter a valid price</div>
              </div>
              <!-- Checkbox -->
              <div class="col-md-12 m-2">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="checkbox" required />
                  <label for="checkbox" class="form-check-label">The information provided is genuine and correct</label>
                  <div class="invalid-feedback">Please agree to the terms and conditions</div>
                </div>
              </div>
              <!-- Submit Button -->
              <div class="col-md-12 m-2">
                <button id="submitBtn" class="btn btn-primary" type="submit">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script>
    const form = document.querySelector("form");
    const typeOfArtSelect = document.getElementById("type-of-art");
    const otherTypeInput = document.getElementById("other-type-input");
    const otherType = document.getElementById("other-type");

    typeOfArtSelect.addEventListener("change", () => {
      if (typeOfArtSelect.value === "other") {
        otherTypeInput.style.display = "block";
        otherType.required = true;
      } else {
        otherTypeInput.style.display = "none";
        otherType.required = false;
      }
    });

    form.addEventListener(
      "submit",
      (e) => {
        if (!form.checkValidity()) {
          e.preventDefault();
          e.stopPropagation();
        }
        form.classList.add("was-validated");
      },
      false
    );
  </script>
</html>
