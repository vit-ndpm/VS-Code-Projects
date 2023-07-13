<style>
    li:hover{
            background-color:rgba(107, 95, 95, 0.5);
           
    }
    .fa-solid {
        font-size: 1.2rem;
    }

    .nav-item:hover {
        transform: scale(1.02);
        opacity: .7;
        color: brown;
    }

    a:link {
        text-decoration: none;
    }
    a:hover {
        color:green;

    }

    .sidebar {
        margin-top: 20px;
    }
</style>
<div class="text-dark  mt-2 ">
    <ul class="d-flex ">

        <li class="justify-content-center  ">
            <div class="text-center m-1 shadow  card p-2">
                <a href="{{ url('subjectList') }}"><i class="fa-solid fa-book  text-success"></i> Subject
                    Management
                </a>
            </div>
        </li>
        <li class="justify-content-center ">
            <div class="text-center m-1 shadow  card p-2">

                <a href="{{ url('TopicList') }}"><i class="fa-solid fa-book-open-reader  text-danger"></i> Topic
                    Management
                </a>
            </div>
        </li>

        <li class="justify-content-center ">

            <div class="text-center m-1 shadow  card p-2">

                <a href="{{ url('paperList') }}"><i class="fa-solid fa-graduation-cap  text-warning"></i>
                    Paper Management
                </a>
            </div>
        </li>
        <li class="justify-content-center ">
            <div class="text-center m-1 shadow card p-2">

                <a href=""><i class="fa-solid fa-clipboard-question  text-primary"></i>
                    Question Management
                </a>
            </div>

        </li>
        <li class="justify-content-center ">
            <div class="text-center m-1 shadow card p-2">

                <a href=""><i class="fa-solid fa-users  text-dark"></i>
                    User Management
                </a>
            </div>
        </li>
        <li class="justify-content-center ">
            <div class="text-center m-1 shadow  card p-2">

                <a href=""><i class="fa-solid fa-square-poll-horizontal  text-success"></i>
                    Result Management
                </a>
            </div>
        </li>


    </ul>
</div>
