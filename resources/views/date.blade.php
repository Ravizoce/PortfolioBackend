<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Nepali Multi Date Picker Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('plugin/nepali-date-picker.css') }}">
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.20.0/themes/prism.min.css" rel="stylesheet" /> --}}

</head>

<body class="bg-light">

    <div class="container">
        <div class="py-5 text-center">
            <a href="https://www.sanil.com.np" target="_blank"><img class="d-block mx-auto mb-5" src="logo.png"
                    alt="" height="72"></a>

            <h1>Nepali Multi Select Date Picker</h1>
            <p class="lead">
                A simple yet powerful jQuery Nepali Date Picker. Supports both single and multiple date selection in
                dual language. <br>
                Multiple date selection can be done by pressing Shift or Control / Command key.
            </p>
            <p>
                - <a class="text-dark" target="_blank" href="https://www.sanil.com.np"><strong>Sanil Shakya</strong></a>
            </p>
        </div>

        <div class="row">

            <div class="col-8 mt-3 offset-md-2">
                <h2>Examples</h2>
                <hr class="mb-5">

                <h4 class="mb-3">Single Date Selection</h4>

                <form>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="staticEmail" class="col-form-label">Example 1.1</label>
                            <input type="text" class="date-picker form-control" data-single="1" name="date1"
                                value="" id="ex1" placeholder="Click here to select date">
                        </div>

                        <div class="col-sm-6">
                            <label for="staticEmail" class="col-form-label">Example 1.2</label>
                            <input type="text" class="date-picker form-control" data-single="true" name="date2"
                                id="ex2" value="2076-01-05" placeholder="Click here to select date">
                        </div>
                    </div>

                </form>
            </div>
        </div>

        <br>
            <br>
            <br>
            <br>
            <br>
            <br>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ asset('plugin/nepali-date-picker.js') }}"></script>

    <script>
        jQuery(document).ready(function() {
            $('.date-picker').nepaliDatePicker();
        })
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.20.0/components/prism-core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.20.0/plugins/autoloader/prism-autoloader.min.js"></script>

</body>

</html>
