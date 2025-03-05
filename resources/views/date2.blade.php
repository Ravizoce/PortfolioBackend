<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- style for the nep cal --}}
    <link rel="stylesheet" href="{{ asset('plugin/nepali-date-picker.css') }}">

</head>

<body>

    <input type="text" class="date-picker" onchange="handleChange(this)">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ asset('plugin/nepali-date-picker.js') }}"></script>
    <script>
        jQuery(document).ready(function() {
            $('.date-picker').nepaliDatePicker();
        })

        function handleChange(input) {
            console.log("Input value changed to:", input.value);
        }
    </script>
</body>

</html>
