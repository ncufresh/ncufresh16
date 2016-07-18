<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta name="csrf-token" content="<?php echo csrf_token() ?>"/>
    <title>Laravel Ajax CRUD Example</title>

    <!-- Load Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <meta name="_token" content="{!! csrf_token() !!}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
    <script>
        $(document).ready(function(){
            $.ajaxSetup({//set the header and 
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
            })

            var url = "/add_question/add";

            //display modal form for creating new task
            $('#btn-add').click(function(){
                $('#btn-save').val("add");
                $('#frmTasks').trigger("reset");
                $('#myModal').modal('show');
            });

            //display modal form for task editing
            $('.open-modal').click(function(){//經由此處點擊class為open-model但id同為#btn-save的按鈕，則Val會=update。會以"update"的方法處理它
                var question_id = $(this).val();

                $.get('/getOneQuestion/'+ question_id, function (data) {//retrieve data from database
                    //success data
                    console.log(data);
                    $('#task_id').val(data.id);//不用改
                    $('#question').val(data.question);
                    $('#selection_1').val(data.selection_1);
                    $('#selection_2').val(data.selection_2);
                    $('#answer').val(data.answer);

                    $('#btn-save').val("update");

                    $('#myModal').modal('show');
                }) 
            });


            //delete task and remove it from list
            $('.delete-task').click(function(){
                var task_id = $(this).val();

                $.ajax({

                    type: "DELETE",
                    url: '/add_question/delete' + '/' + task_id,
                    success: function (data) {
                        console.log(data);

                        $("#task" + task_id).remove();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            });

            //create new task / update existing task
            $("#btn-save").click(function (e) {
                    

                    e.preventDefault(); 

                    var formData = {
                        question: $('#question').val(),
                        selection_1: $('#selection_1').val(),
                        selection_2: $('#selection_2').val(),
                        answer: $('#answer').val(),
                    }

                    
                    
                    var state = $('#btn-save').val();

                    var type = "POST"; //for creating new resource
                    var task_id = $('#task_id').val();;
                    var my_url = '/add_question/add';

                    if (state == "update"){
                        type = "PUT"; //for updating existing resource
                        my_url += ('/' + task_id);
                    }

                    $.ajax({

                        type: type,    
                        url: my_url,
                        data: formData,//傳送的資料
                        dataType: "json",//以json格式傳送
                        headers: {
                            'X-CSRF-Token': $('meta[name="token"]').attr('content')
                        },
                        success: function (data) {
                            console.log(data);
                            var task = '<tr id="task' + data.id + '"><td>' + data.id + '</td><td>' + data.question + '</td><td>' + data.selection_1 + '</td><td>' + data.selection_2 + '</td><td>'+ data.answer+'</td>';
                            task += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.id + '">Edit</button>';
                            task += '<button class="btn btn-danger btn-xs btn-delete delete-task" value="' + data.id + '">Delete</button></td></tr>';
                            if (state == "add"){ //if user added a new record
                                $('#tasks-list').append(task);
                            }else{ //if user updated an existing record
                                $("#task" + task_id).replaceWith( task );
                            }
                            $('#frmTasks').trigger("reset");
                            $('#myModal').modal('hide');


                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
            }); 
        });

    </script>



    <div class="container-narrow">

        <h2>add question to database</h2>
        <button id="btn-add" name="btn-add" class="btn btn-primary btn-xs">Add New Task</button><!-- create -->
        <div>


            <table class="table">
                <thead>
                    <tr>
                        <th>iD</th>
                        <th>question</th>
                        <th>selection_1</th>
                        <th>selection_2</th>
                        <th>answer</th>
                    </tr>
                </thead>
                <tbody id="tasks-list" name="tasks-list">
                    @foreach ($questions as $task)
                    <tr id="task{{$task->id}}">
                        <td>{{$task->id}}</td>
                        <td>{{$task->question}}</td>
                        <td>{{$task->selection_1}}</td>
                        <td>{{$task->selection_2}}</td>
                        <td>{{$task->answer}}</td>
                        <td>
                            <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$task->id}}">Edit</button>
                            <button class="btn btn-danger btn-xs btn-delete delete-task" value="{{$task->id}}">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- End of Table-to-load-the-data Part -->
            <!-- Modal (Pop up when detail button clicked) -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">Question Editor</h4>
                        </div>
                        <div class="modal-body">
                            <form id="frmTasks" name="frmTasks" class="form-horizontal" novalidate="">

                                <div class="form-group error">
                                    <label for="inputTask" class="col-sm-3 control-label">question</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="question" name="question" placeholder="Question" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">selection_1</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="selection_1" name="selection_1" placeholder="Selection_1" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">selection_2</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="selection_2" name="selection_2" placeholder="Selection_2" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">answer</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="answer" name="answer" placeholder="Answer" value="">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save" value="add">Save questions</button>
                            <input type="hidden" id="task_id" name="task_id" value="0"><!-- 傳值回service!注意此處 -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
   
</body>
</html>