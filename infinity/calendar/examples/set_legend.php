<!DOCTYPE html>
<html>
<head>
    <title>Zabuto | Calendar | Set Legend</title>
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- jQuery CDN -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="//oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- Example style -->
    <link rel="stylesheet" type="text/css" href="//zabuto.com/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- Zabuto Calendar -->
    <script src="../zabuto_calendar.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../zabuto_calendar.min.css">

</head>
<body>

<!-- container -->
<div class="container example">


    <hr>

    <div class="row">
        <div class="col-xs-6">
            <p>You can add a legend to clarify the styling of the date events shown on the calendar.</p>
            <table>
                <tr>
                    <th>legend</th>
                    <td class="type">array</td>
                    <td>List of legend element objects.</td>
                </tr>
            </table>
        </div>
        <div class="col-xs-6">
            <
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-xs-5">

            <div id="my-calendar"></div>

            <style>
                .grade-1 {
                    background-color: #FA2601;
                }

                .grade-2 {
                    background-color: #FA8A00;
                }

                .grade-3 {
                    background-color: #FFEB00;
                }

                .grade-4 {
                    background-color: #27AB00;
                }

                .purple {
                    background-color: purple;
                }
            </style>

            <script type="application/javascript">
                $(document).ready(function () {
                    $("#my-calendar").zabuto_calendar({
                        legend: [
                            {type: "text", label: "Special event", badge: "00"},
                            {type: "block", label: "Regular event", classname: 'purple'},
                            {type: "spacer"},
                            {type: "text", label: "Bad"},
                            {type: "list", list: ["grade-1", "grade-2", "grade-3", "grade-4"]},
                            {type: "text", label: "Good"}
                        ],
                        ajax: {
                            url: "show_data.php?grade=4"
                        }
                    });
                });
            </script>

        </div>
        <div class="col-xs-6 col-xs-offset-1">



        </div>
    </div>

</div>
<!-- /container -->

</body>
</html>
