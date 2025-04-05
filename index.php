<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP AJAX Form Validation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">User Registration Form</h2>

    <form id="userForm">
        <div class="mb-3">
            <label>First Name</label>
            <input type="text" name="fname" class="form-control">
            <small class="text-danger error-fname"></small>
        </div>

        <div class="mb-3">
            <label>Last Name</label>
            <input type="text" name="lname" class="form-control">
            <small class="text-danger error-lname"></small>
        </div>

        <div class="mb-3">
            <label>Gender</label><br>
            <input type="radio" name="gender" value="Male"> Male
            <input type="radio" name="gender" value="Female"> Female
            <br>
            <small class="text-danger error-gender"></small>
        </div>

        <div class="mb-3">
            <label>Hobbies</label><br>
            <input type="checkbox" name="hobbies[]" value="Reading"> Reading
            <input type="checkbox" name="hobbies[]" value="Travelling"> Travelling
            <br>
            <small class="text-danger error-hobbies"></small>
        </div>

        <div class="mb-3">
            <label>Address</label>
            <textarea name="address" class="form-control"></textarea>
            <small class="text-danger error-address"></small>
        </div>

        <div class="mb-3">
            <label>Grade</label>
            <select name="grade" class="form-control">
                <option value="">Select</option>
                <option value="A">A</option>
                <option value="B">B</option>
            </select>
            <small class="text-danger error-grade"></small>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <div class="mt-3 success-msg text-success fw-bold"></div>
</div>

<script>
$(document).ready(function(){
    $('#userForm').submit(function(e){
        e.preventDefault();

        $('.text-danger').html('');
        $('.success-msg').html('');

        $.ajax({
            url:'validation.php',
            method:'POST',
            data: $(this).serialize(),
            success:function(response){
                var data = JSON.parse(response);
                if(data.error){
                    $.each(data.error, function(key, value){
                        $('.error-'+key).html(value);
                    });
                }else{
                    $('.success-msg').html(data.success);
                    $('#userForm')[0].reset();
                }
            }
        });
    });
});
</script>
</body>
</html>
