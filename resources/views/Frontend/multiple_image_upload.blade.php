<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 7 Multiple File Upload with Progress bar using Ajax jQuery</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    {{-- <script src="http://malsup.github.com/jquery.form.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Upload Multiple Images in Laravel 7</h3>
            </div>
            <div class="card-body">
                <br />
                <form method="post" action="{{url('multiple-file-upload')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-3" align="right">
                            <h4>Select Multiple Files</h4>
                        </div>
                        <div class="col-md-6">
                            <input type="file" name="photos[]" id="file" accept="image/*" multiple required/>
                        </div>
                        <div class="col-md-3">
                            <input type="submit" name="upload" value="Upload" class="btn btn-success" />
                        </div>
                    </div>
                </form>
                <br />
                <div class="progress">
                    <div class="progress-bar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                        0%
                    </div>
                </div>
                <br />
                <div id="success" class="row">
                </div>
                <br />
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('form').ajaxForm({
                beforeSend: function () {
                    $('#success').empty();
                    $('.progress-bar').text('0%');
                    $('.progress-bar').css('width', '0%');
                },
                uploadProgress: function (event, position, total, percentComplete) {
                    $('.progress-bar').text(percentComplete + '0%');
                    $('.progress-bar').css('width', percentComplete + '0%');
                },
                success: function (data) {
                    if (data.success) {
                        $('#success').html('<div class="text-success text-center"><b>' + data.success + '</b></div><br /><br />');
                        $('#success').append(data.image);
                        $('.progress-bar').text('Uploaded');
                        $('.progress-bar').css('width', '100%');
                    }
                }
            });
        });
    </script>
</body>

</html>
