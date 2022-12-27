<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Image Upload With ProgressBar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script> --}}
    <style>
        .progress{
            position: relative;
            width: 50%;
            background-color: #c9cfc9;
        }
        .bar{
            background-color: #9595eb;
            width: 0%;
            height: 20px;
            transition-duration: 1500ms;
        }
        .percent{
            position: absolute;
            display: inline-block;
            left: 50%;
            color: #040608;

        }
    </style>
</head>
<body>

    <h1 class="text-center">Image Upload With ProgressBar</h1>
    <form id="fileUploadForm" action="{{route('image.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
       <div class="container">
        <div class="form-group col-md-6">
            <input type="hidden" name="name" value="ss">
        </div>

        <div class="form-group col-md-6" >
            <input type="file" name="image" class="form-control" required>&nbsp;
        </div>

        <div class="progress">
            <div class="bar"></div>
            <div class="percent">0%</div>
        </div>
        <br><br/>
       <input type="submit" name="submit" value="Upload"/>
       </div>


    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <script>
        $(document).ready(function(){
            var bar = $('.bar');
            var percent = $('.percent');

            $('#fileUploadForm').ajaxForm({
                beforeSend:function(){
                    var percentVal = '0%';
                    bar.width(percentVal);
                    percent.html(percentVal);
                },
                uploadProgress:function(event, position, total, percentComplete){
                    var percentVal = percentComplete + '%';
                    bar.width(percentVal);
                    percent.html(percentVal);
                },
                complete:function(res){
                    console.log(res);
                    // alert('file uploaded');
                }
            })

        })
    </script>
</body>
</html>
{{-- alok daaa reference
9830106369 --}}
