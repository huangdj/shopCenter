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

    //全选，反选
    $("#checked").click(function () {
        $(':checkbox').prop("checked", this.checked);
    });

    //删除所选
    $('#destroy_checked').click(function () {
        var length = $(".checked_id:checked").length;
        if (length == 0) {
            alert("您必须至少选中一条!");
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
