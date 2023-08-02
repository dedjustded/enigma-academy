<style>
    label {
        font-weight: bold;
    }

    .button {
        margin-top: 10px;
    }

    .homework_class input[type="file"] {
        margin-top: 5px;
    }

    .training_class,
    .module_class,
    .lecture_class,
    .schedule_class,
    .homework_class,
    .submit_class {
        border-bottom: 1px solid #ccc;
        padding-bottom: 20px;
        margin-bottom: 20px;
    }

    .training_class {
        padding-top: 5px;
    }

    .description_class {
        padding-top: 50px;
        padding-bottom: 50px;
    }

    .add_description {
        size: "50";
        width: 80%;
        height: 100px;
    }

    .add_training_div {
        padding-top: 50px;
    }

    /* Dropdown Button */
    .dropbtn {
        background-color: #04AA6D;
        color: white;
        padding: 5px;
        font-size: 16px;
        border: none;
    }

    /* The container <div> - needed to position the dropdown content */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {
        background-color: #ddd;
    }

    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {
        display: block;
    }

    /* Change the background color of the dropdown button when the dropdown content is shown */
    .dropdown:hover .dropbtn {
        background-color: #3e8e41;
    }

    body {
        background-color: #f2f2f2;
        font-family: Arial, sans-serif;
    }

    .container {
        margin-top: 50px;
    }

    .card {
        border: none;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
    }

    .card-body {
        padding: 20px;
    }

    h2 {
        color: #333;
        font-size: 24px;
        margin-top: 0;
        margin-bottom: 10px;
    }

    p {
        color: #666;
        margin-top: 0;
        margin-bottom: 10px;
    }

    ul {
        list-style-type: none;
        padding-left: 0;
    }

    .module-name {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .lecture-name {
        margin-bottom: 5px;
    }

    a {
        color: #337ab7;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    .button-add button:hover {
        background-color: #45a049;
    }

    header {
        background-color: #333;
        color: #fff;
        padding: 10px;
        margin-bottom: 20px;
    }

    header nav ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    header nav ul li {
        display: inline;
        margin-right: 10px;
    }

    header nav ul li a {
        color: #fff;
        text-decoration: none;
    }

    header nav ul li a span {
        text-decoration: underline;
    }


    body {
        background-image: url("{{ asset('/assets/img/hero/h1_hero') }}");
        background-size: cover;
        background-position: center;

    }
</style>

<head>
    <title>Training List</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <header>
        <nav>
            <ul>
                <li><a href='/'>Home</a></li>
                <li><a href='/admin/trainings'><b><span>Trainings</span></b></a></li>
            </ul>
        </nav>
    </header>

</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (!$trainings->isEmpty())
                @foreach ($trainings as $training)
                <div class="card">
                    <div class="card-body">
                        <a href="/training/{{$training->id}}">
                            <h2>{{$training->course_name}}</h2>
                        </a>
                        <p>{{$training->description}}</p>
                        <p><strong>Training period:</strong> {{$training->schedule_from}} to {{$training->schedule_to}}</p>
                        @if(!$training->module->isEmpty())
                        <p><strong>Modules:</strong></p>
                        <ul>
                            @foreach ($training->module as $module)
                            <li>
                                <div class="module-name">
                                    <a href="/module/{{$module->id}}">{{$module->name}}</a>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</body>