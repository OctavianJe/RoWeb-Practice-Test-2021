<html>

    <head>
        <title>PHP Ajax Crud using JQuery UI Dialog Box</title>
        <link rel="stylesheet" href="jquery/jquery-ui.css">
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <script src="jquery/jquery.min.js"></script>
        <script src="jquery/jquery-ui.js"></script>
    </head>

    <body>
        <div class="container">
            <br />

            <h3 align="center">PHP Ajax CRUD using JQuery UI Dialog</a></h3><br />
            <br />
            <div align="right" style="margin-bottom:5px;">
                <button type="button" name="add" id="add" class="btn btn-success btn-xs">CREATE</button>
            </div>
            <div class="table-responsive" id="user_data">

            </div>
            <br />
        </div>

        <div id="user_dialog" title="Add Data">
            <form method="post" id="user_form">
                <div class="form-group">
                    <label>Enter Title</label>
                    <input type="text" name="title" id="title" class="form-control" />
                    <span id="error_title" class="text-danger"></span>
                </div>

                <div class="form-group">
                    <label>Enter Text</label>
                    <input type="text" name="text" id="text" class="form-control" />
                    <span id="error_text" class="text-danger"></span>
                </div>

                <div class="form-group">
                    <label>Enter Category</label>
                    <input type="text" name="category" id="category" class="form-control" />
                    <span id="error_category" class="text-danger"></span>
                </div>

                <!-- TODO: Generate random image button -->

                <div class="form-group">
                    <input type="hidden" name="action" id="action" value="insert" />
                    <input type="hidden" name="hidden_id" id="hidden_id" />
                    <input type="submit" name="form_action" id="form_action" class="btn btn-info" value="Insert" />
                </div>
            </form>
        </div>

        <div id="action_alert" title="Action">

        </div>

        <div id="delete_confirmation" title="Confirmation">
            <p>Are you sure you want to Delete this data?</p>
        </div>

    </body>
</html>

<script>
    $(document).ready(function(){

        load_data();

        function load_data()
        {
            $.ajax({
                url:"fetch.php",
                method:"POST",
                success:function(data)
                {
                    $('#user_data').html(data);
                }
            });
        }

        $("#user_dialog").dialog({
            autoOpen:false,
            width:400
        });

        $('#add').click(function(){
            $('#user_dialog').attr('title', 'Add Data');
            $('#action').val('insert');
            $('#form_action').val('Insert');
            $('#user_form')[0].reset();
            $('#form_action').attr('disabled', false);
            $("#user_dialog").dialog('open');
        });

        $('#user_form').on('submit', function(event){
            event.preventDefault();

            var error_title = '';
            var error_text = '';
            var error_category = '';

            if($('#title').val() == '')
            {
                error_tile = 'Title is required';
                $('#error_title').text(error_title);
                $('#title').css('border-color', '#cc0000');
            }
            else
            {
                error_title = '';
                $('#error_title').text(error_title);
                $('#title').css('border-color', '');
            }

            if($('#text').val() == '')
            {
                error_text = 'Text is required';
                $('#error_text').text(error_text);
                $('#text').css('border-color', '#cc0000');
            }
            else
            {
                error_text = '';
                $('#error_text').text(error_text);
                $('#text').css('border-color', '');
            }

            if($('#category').val() == '')
            {
                error_category = 'Category is required';
                $('#error_category').text(error_category);
                $('#category').css('border-color', '#cc0000');
            }
            else
            {
                error_category = '';
                $('#error_category').text(error_category);
                $('#category').css('border-color', '');
            }

            if(error_title != '' || error_text != '' || error_category != '')
            {
                return false;
            }
            else
            {
                $('#form_action').attr('disabled', 'disabled');
                var form_data = $(this).serialize();
                $.ajax({
                    url:"action.php",
                    method:"POST",
                    data:form_data,
                    success:function(data)
                    {
                        $('#user_dialog').dialog('close');
                        $('#action_alert').html(data);
                        $('#action_alert').dialog('open');
                        load_data();
                        $('#form_action').attr('disabled', false);
                    }
                });
            }

        });

        $('#action_alert').dialog({
            autoOpen:false
        });

        $(document).on('click', '.edit', function(){
            var id = $(this).attr('id');
            var action = 'fetch_single';
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{id:id, action:action},
                dataType:"json",
                success:function(data)
                {
                    $('#title').val(data.title);
                    $('#text').val(data.text);
                    $('#category').val(data.category);
                    $('#image').val(data.image);

                    $('#user_dialog').attr('title', 'Edit Data');
                    $('#action').val('update');
                    $('#hidden_id').val(id);
                    $('#form_action').val('Update');
                    $('#user_dialog').dialog('open');
                }
            });
        });

        $('#delete_confirmation').dialog({
            autoOpen:false,
            modal: true,
            buttons:{
                Ok : function(){
                    var id = $(this).data('id');
                    var action = 'delete';
                    $.ajax({
                        url:"action.php",
                        method:"POST",
                        data:{id:id, action:action},
                        success:function(data)
                        {
                            $('#delete_confirmation').dialog('close');
                            $('#action_alert').html(data);
                            $('#action_alert').dialog('open');
                            load_data();
                        }
                    });
                },
                Cancel : function(){
                    $(this).dialog('close');
                }
            }
        });

        $(document).on('click', '.delete', function(){
            var id = $(this).attr("id");
            $('#delete_confirmation').data('id', id).dialog('open');
        });

    });
</script>