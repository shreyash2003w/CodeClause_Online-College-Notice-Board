<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Notice</title>
</head>
<body>
    
   <center><h2>Notice Form</h2></center> 
    <div>
        <form action="" method="post">
            <div class="form-group mt-2">
                <label>Send TO:</label>
                <select  class="form-control" name="to_whom" >
                    <option >To All</option>
                    <option >First Year</option>
                    <option >Second Year</option>
                    <option >Third Year</option>
                    <option >Fourth Year</option>
                    
                </select>
            </div>
            <div class="form-group mt-2">
                <label>Post Date:</label>
                <input type="date" class="form-control" name="post_date">
            </div>
            <div class="form-group mt-2">
                <label>Subject:</label>
                <input type="text" class="form-control" name="subject" placeholder="Enter Subject">
            </div>
            <div class="form-group mt-2">
                <label>Message:</label>
                <textarea name="message" class="form-control" cols="30" rows="10" placeholder="Enter Message"></textarea>
            </div>
            <div>
                <button type="submit" class="btn btn-primary mt-2" name="send_notice">Send Notice</button>
            </div>
        </form>
    </div>
</body>
</html>