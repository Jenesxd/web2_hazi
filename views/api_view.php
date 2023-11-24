<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>API Tester</title>
</head>
<body>
    <h1>API Tester</h1>
    <form id="postForm">
        <input type="number" name="ev" placeholder="Év">
        <input type="number" name="no" placeholder="Nők száma">
        <input type="number" name="osszesen" placeholder="Összesen">
        <button type="submit">Submit</button>
    </form>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(function() {
        $('#postForm').on('submit', function(e) {
            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                url: '/web2_hazi/lelekszam_csv', 
                type: 'POST',
                data: data,
                
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
    </script>
</body>
</html>
