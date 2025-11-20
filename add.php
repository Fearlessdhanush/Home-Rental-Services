<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Property</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Add Property</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form id="addPropertyForm" action="function.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="bedrooms">Bedrooms</label>
                        <input type="text" class="form-control" id="bedrooms" name="bedrooms" required>
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control" id="location" name="location" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price" required>
                    </div>
                    <div class="form-group">
                        <label for="availability">Availability</label>
                        <select class="form-control" id="availability" name="availability" required>
                            <option value="">Select Availability</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Insert</button>
                </form>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-md-6">
                <a href="in.php" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
</body>
</html>
