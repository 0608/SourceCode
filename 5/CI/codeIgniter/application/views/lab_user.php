<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>test</title>
    <script src="js/jquery-1.11.1.min.js"></script>


<script>
    $(function(){
        var arr = [];
        for (i = 0; i < 10; i ++)
            arr[i] = [];

        var k = 0;
        for (i = 0; i < 10; i++)
            for (j = 0; j < 10; j++){
                arr[i][j] = k;
                k++;
            }

        $.post(
            'post.php', 
            {
                data : JSON.stringify(arr)
            },
            function(data) {
                document.write(data);
            }
        );
    })
</script>


</head>
<body>
</body>
</html>

                        $.("#confirm").on('click',function() {

                            $.ajax({
                                url:'do_upload',
                                type:'post',
                                data:{sche:JSON.stringify(schedule)},
                                async:true,//是否同步刷新
                                datatype:'json',
                                //alert(sche);
                                error:function() {
                                    alert('error');
                                },
                                success:function(result) {        
                                    
                                    }
                                    /*if(result == 2) {
                                        alert(result);                              
                                    }else {
                                         //更新用户实验室信息
                                        $.ajax({
                                            url:'add_person',
                                            type:'post',
                                            data:{studentid:value},
                                            async:true,
                                            datatype:'text',
                                            error:function() {
                                                alert('error');
                                            },
                                            success:function(result) {      
                                                if(result == 0)
                                                    alert('添加失败');
                                                else{
                                                    if(result ==2)
                                                        alert('添加过了！')
                                                    else
                                                        alert('添加成功');
                                                }
                                                    
                                            },
                                        })
                                        //$('#form').submit();*/
                                        //parent.location.reload();
                                })
                            })