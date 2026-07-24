</body>
<script src="public/js/bootstrap-select.js"></script>
<script src="public/js/frotel/city.js"></script>
<script src="public/js/frotel/ostan.js"></script>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4>افزودن آدرس</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="add_address">
                    <div class="form-group">
                        <label for="name">نام و نام خانوادگی تحویل گیرنده</label>
                        <input name="name" type="text" class="form-control" id="name">
                    </div>

                    <div class="form-group">
                        <label for="tell">شماره تماس ضروری</label>
                        <input name="tell" type="text" class="form-control" id="tell">
                    </div>
                    <div class="form-group">
                        <label for="phone">شماره ثابت</label>
                        <input type="text" name="phone" class="form-control" id="phone">
                    </div>
                    <div class="form-group">
                        <label for="state">استان/شهر</label>
                        <select class="selectpicker" name="state_id" id="state"></select>

                    </div>
                    <div class="form-group">
                        <label for="city">شهرستان :</label>
                        <select name="city_id" class="selectpicker" id="city"></select>
                    </div>
                    <div class="form-group">
                        <label id="upperAddress" for="address">آدرس</label>
                        <textarea name="address" class="form-control" id="address"></textarea>
                    </div>
                    <script>
                        loadOstan('state');
                        $('#state').change(function () {
                            var i = $(this).find('option:selected').val();
                            ldMenu(i, 'city');
                            $('.selectpicker').selectpicker('refresh');
                        });

                    </script>

                    <div class="form-group">
                        <label for="postcode">کد پستی</label>
                        <input name="post_code" type="text" class="form-control" id="post_code">
                    </div>
                    <div class="form-group">
                        <input name="send" id="send" type="button" value="ثبت" class="btn btn-primary"/>
                        <input style="display: none" name="update" id="update" type="button" value="بروزرسانی"
                               class="btn btn-primary"/>
                    </div>
                </form>
                <script>
                    //رویداد دکمه اضافه کردن آدرس جدید
                    function show_add_address() {
                        $('#update').hide();
                        $('#send').show();
                        $('#add_address').trigger('reset');
                        $('.selectpicker').selectpicker('refresh');
                    }
                    //رویداد دکمه بروزرسانی آدرس انتخاب شده
                    $('#update').click(function () {
                        alert('update')


                        window.location = 'showcart2';
                    });
                    //رویداد اضافه کردن آدرس جدید
                    $('#send').click(function () {
                        var data = $('#add_address').serializeArray();
                        data.push({name: "state_name", value: $('#state option:selected').text().trim()});
                        data.push({name: "city_name", value: $('#city option:selected').text().trim()});
                        var url = 'showcart2/add_address';
                        $.post(url, data, function (msg) {
                            console.log(msg);
                            window.location = 'showcart2';
                        });
                    });
                    //رویداد زدن دکمه بروزرسانی آدرس در لیست آدرس ها
                    $('.edit').click(function () {
                            $('#send').hide();
                            $('#update').show();
                            var row = $(this).parents('.row');
                            $('#name').val(row.find('.user_name').text().trim());
                            $('#address').val(row.find('.address').text().trim());
                            $('#phone').val(row.find('.cell_phone').text().trim());
                            $('#tell').val(row.find('.emergency_phone').text().trim());
                            $('#post_code').val(row.find('.code_post').text());

                            var state_id = row.find('.state_name').attr('data-value');
                            var city_id = row.find('.city_name').attr('data-value');
                            $('#state option').each(function () {
                                if ($(this).val() == state_id) {
                                    $(this).prop('selected', true);
                                    ldMenu(state_id, 'city');
                                    $('.selectpicker').selectpicker('refresh');
                                }
                            });
                            setTimeout(function () {
                                $('#city option').each(function () {
                                    if ($(this).val() == city_id) {
                                        $(this).prop('selected', true);
                                        $('.selectpicker').selectpicker('refresh');
                                    }
                                });
                            }, 1000);
                            $('#myModal').modal('show');
                        }
                    );
                    function get_post_price(city_id,id) {
                        let url='showcart2/get_post_prices';
                        $.post(url,{'city_id':city_id,'id':id},function (msg) {
                           // console.log(msg);
                            $('.post_price:eq(0)').text((msg[0]['posti'][1]['post']));
                            $('.post_price:eq(1)').text((msg[1]['posti'][2]['post']));
                        },'json');

                    }
                    
                    
                </script>

            </div>
        </div>
    </div>
</div>
<script>
    $('.circle').click(function () {
        $('.circle').removeClass('active');
        $('.valed_cricle').each(function () {
            $(this).find('i').first().removeClass('triangle');
        });
        $(this).addClass('active');
        $(this).parent().find('i').first().addClass('triangle');
        get_post_price($(this).attr('data-id'),$(this).attr('data-row'));

    });
    $('.circle2').click(function () {
        $('.circle2').removeClass('active');
        $(this).addClass('active');
        var url='showcart2/set_post_price_on_session';
        var data={'post_price':$(this).parents('.second').find('.post_price').text(),'post_type':$(this).parents('.second').find('.post_type_name').text()};
        $.post(url,data,function (msg) {
        })
    });

</script>
<script>
    $('.selectpicker').selectpicker();
</script>
</html>