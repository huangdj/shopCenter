$(function () {
    //库存
    $("input[name='stock']").change(function () {
        var stock = $(this).val();
        var data = {
            stock: stock,
            id: $(this).parents("tr").data('id')
        }

        $.ajax({
            type: "PATCH",
            url: "/admin/products/change_stock",
            data: data,
            success: function () {
                location.href = location.href
            }
        });
    })

    //满额
    $("input[name='full_num']").change(function () {
        var full_num = $(this).val();
        var data = {
            full_num: full_num,
            id: $(this).parents("tr").data('id')
        }

        $.ajax({
            type: "PATCH",
            url: "/admin/products/change_full_num",
            data: data,
            success: function () {
                location.href = location.href
            }
        });
    })

    //折扣
    $("input[name='discount']").change(function () {
        var discount = $(this).val();
        var data = {
            discount: discount,
            id: $(this).parents("tr").data('id')
        }

        $.ajax({
            type: "PATCH",
            url: "/admin/products/change_discount",
            data: data,
            success: function () {
                location.href = location.href
            }
        });
    })

    //是否...
    $(".is_something").click(function () {
        var _this = $(this);
        var data = {
            id: _this.parents("tr").data('id'),
            attr: _this.data('attr')
        }

        $.ajax({
            type: "PATCH",
            url: "/admin/products/is_something",
            data: data,
            success: function () {
                _this.toggleClass('am-icon-close am-icon-check');
            }
        });
    });

    //全选，反选
    $("#checked").click(function () {
        $(':checkbox').prop("checked", this.checked);
    });

    //删除所选
    $('#destroy_checked').click(function () {
        var length = $(".checked_id:checked").length;
        if (length == 0) {
            alert("请选择您要操作的数据!");
            return false;
        }
        var checked_id = $(".checked_id:checked").serialize();

        $.ajax({
            type: "DELETE",
            url: "/admin/products/destroy_checked",
            data: checked_id,
            success: function (data) {
                if (data.status == false) {
                    alert(data.message)
                    return false
                } else {
                    alert(data.message)
                    $(".checked_id:checked").each(function () {
                        $(this).parents('tr').remove()
                    })
                }
            }
        });
    });
})
