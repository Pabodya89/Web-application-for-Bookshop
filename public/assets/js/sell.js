// ________________________POPUP_________________________________
                
$(document).ready(function() 
{
    console.log('document is ready');
    $('.confirm').click(function()
    {
        (async () => {
            const {value:formValues} = await Swal.fire({
                title:'Confirm payment',
                // html:
                // '<input type="text" id="name" class="swal2-input">' +
                // '<input type="text" id="age" class="swal2-input">',
                showCancelButton: true,
            })

            if(formValues)
            {
                var data = 
                {
                    items: items,
                    total_discount: total_discount,
                    total_price: total_price
                };

                $.ajax({
                    url:'sell_update_tables',
                    data:JSON.stringify(data),
                    type:'POST',
                    contentType: 'application/json',
                    success: function(response)
                    {
                        // var data = JSON.parse(x);
                        // console.log(data);
                        Swal.fire({
                            icon: 'success',
                            title: 'Payment successful'
                        });
                    console.log(response);
                    setTimeout(function() 
                    {
                        location.reload();
                    }, 2000);

                    },
                    error: function()
                    {
                        console.log('wrong');
                    }
                })
            }
        })()
    })
})


//____________________________Barcode validate (fill the form)________________________________

function find_barcode(event)
{
    event.preventDefault();
    var barcode = document.getElementById('barcode_check').value;

    jQuery.ajax({
        url:'sell_get_barcode',
        data: {barcode: barcode},
        type: 'POST',
        success: function(x)
        {
            try 
            {
                var data = JSON.parse(x);

                if(data.error) 
                {
                    $("#product_name").val('');
                    $("#product_description").val('');
                    $("#barcode").val('');
                    $("#maximum_price").val('');
                    $("#discount").val('');
                    $("#sell_date").val('');
                    $("#Quantity").val('');
                    $('#remain_items').val('');

                   
                    $('.error1').text(data.error);                
                } 
                else 
                {
                    $('.error1').text('');
                    
                    $('#product_id').val(data.id);
                    $('#product_name').val(data.productname);
                    $('#product_description').val(data.productdescription);
                    $('#barcode').val(data.barcode);
                    $('#maximum_price').val(data.price);
                    $('#discount').val(data.discount);
                    $('#remain_items').val(data.max_quantity);
                    $("#Quantity").val('1');

                    var today = new Date();
                    var formattedDate = formatDate(today);
                    $("#sell_date").val(formattedDate);
                }
            } 
            catch (e) 
            {
                $("#product_name").val('');
                $("#product_description").val('');
                $("#barcode").val('');
                $("#maximum_price").val('');
                $("#discount").val('');
                $("#sell_date").val('');
                $("#Quantity").val('');

                document.querySelector('.error1').innerHTML = 'Invalid response from server';
            }
        },
        error: function()
        {
            alert('wrong');
        }
    });
}

function formatDate(date) 
{
    var month = date.getMonth() + 1; // Months are zero-based
    var day = date.getDate();
    var year = date.getFullYear();

    // Add leading zeros if necessary
    if (month < 10) month = '0' + month;
    if (day < 10) day = '0' + day;

    return month + '/' + day + '/' + year;
}






//_______________________________Send data into checkout______________________________
const items = [];
const total_discount = [];
const total_price = [];

// Function to add an item to the bill
function addItem() 
{

    var today = new Date();
    var formattedDate = formatDate(today);
    // Get item name and price from input fields
    const itemId = document.getElementById('product_id').value;
    const itemName = document.getElementById('product_name').value;
    const itemDescription = document.getElementById('product_description').value;
    const itemPrice = document.getElementById('maximum_price').value;
    const itemDiscount = document.getElementById('discount').value;
    const itemQuantity = document.getElementById('Quantity').value;
    const item_remain_lot_size = document.getElementById('remain_items').value;
    const itemSelldate = formattedDate;
    const itemBarcode = document.getElementById('barcode').value;

    const float_item_price = parseFloat(itemPrice);
    const float_item_discount = parseFloat(itemDiscount);
    const int_item_quantity = parseInt(itemQuantity);
    const int_item_max_remain_lot = parseInt(item_remain_lot_size);


    // Check if item name and price are not empty
    if (itemDescription !== '' && itemPrice !== '') 
    {
        validate_items(int_item_max_remain_lot, itemQuantity);
        function validate_items(int_item_max_remain_lot, itemQuantity)
        {
            const err6 = document.getElementById('error6');
    
            if(itemQuantity === ''|| itemQuantity<=0)
            {
                err6.textContent = 'Enter valid quantity';
                // console.log('have errors');
            }
            else if(itemQuantity > int_item_max_remain_lot)
            {
                err6.textContent = 'Maximum items exceeded';
            }
            else
            {
                err6.textContent='';

                // Add the new item to the items array
                const One_Item_All_Discount = float_item_price * int_item_quantity * float_item_discount /100;
                const One_Item_All_Last_Price = float_item_price * int_item_quantity - One_Item_All_Discount;

                items.push({pid:itemId, disc: itemDescription, price: parseFloat(itemPrice), qty: parseInt(itemQuantity), dcount: parseFloat(itemDiscount), barcode: itemBarcode, selldate: itemSelldate});
                total_discount.push({t_discount: One_Item_All_Discount});
                total_price.push({t_price: One_Item_All_Last_Price});
        
                
                // Clear input fields
                document.getElementById('product_description').value = '';
                document.getElementById('maximum_price').value = '';
                document.getElementById('discount').value = '';
                document.getElementById('Quantity').value = '';
                document.getElementById('sell_date').value = '';
                document.getElementById('barcode').value = '';
                document.getElementById('remain_items').value = '';

                updateBill();
             }
        }
    }
    else 
    {
        alert('Please Scan the Barcode');
    }
}

// Function to update the bill display
function updateBill() 
{    
    const billBody = document.getElementById('item_body');

    // Clear the current bill display
    billBody.innerHTML = '';

    // let List_discount = 0;
    // let List_price = 0;
    
    items.forEach((item, index) => 
        {
        const row = document.createElement('tr');
        row.id = `item-${index}`;
        row.className = 'item';

        const nameCell = document.createElement('td');
        nameCell.id = 'colspan';
        nameCell.colSpan='2';
        nameCell.textContent = item.disc;

        const maxpriceCell = document.createElement('td');
        maxpriceCell.id = 'colspan';
        maxpriceCell.colSpan='2';
        maxpriceCell.textContent = item.price;

        const qtyCell = document.createElement('td');
        qtyCell.id = 'qt';
        qtyCell.className = 'qt';
        qtyCell.textContent = item.qty;

        const distCell = document.createElement('td');
        distCell.id = 'dist';
        distCell.className = 'dist';


        const priceCell = document.createElement('td');
        priceCell.id = 'data_td';

         // Create a cell for the clear button
         const actionCell = document.createElement('td');
         const clearButton = document.createElement('button');
         clearButton.textContent = 'Clear';
         clearButton.onclick = () => clearItem(index);
         actionCell.appendChild(clearButton);


        const final_discount = item.price * item.qty * item.dcount / 100;
        const final_price = item.price * item.qty - final_discount;
        distCell.textContent = final_discount;
        priceCell.textContent = final_price;

        row.appendChild(nameCell);
        row.appendChild(maxpriceCell);
        row.appendChild(qtyCell);
        row.appendChild(distCell);
        row.appendChild(priceCell);
        row.appendChild(actionCell);

        // Append the row to the bill body
        billBody.appendChild(row);

    });

    const List_discount = calc_List_discount();
    const List_price = calc_List_price();
    const List_qty = calc_List_qty();
    const List_max_price = calc_List_max_price();

    console.log('List discount:', List_discount);
    console.log('List price:', List_price);

    // $('#total_discount').text(List_discount.value);
    // $('#total_price').text(List_price.value);

    document.getElementById('total_discount').textContent = List_discount;
    document.getElementById('total_price').textContent = List_price;
    document.getElementById('total_qty').textContent = parseInt(List_qty);
    document.getElementById('max_price').textContent = List_max_price;


    //_________________ENABLE CONFIRM BILL BUTTON___________________
    const totalPriceElement = document.getElementById('total_price');
    const confirmButton = document.getElementById('confirm');

    function updateConfirmButton() 
    {
        const totalpCount = parseFloat(totalPriceElement.textContent);

        if (totalpCount > 0) 
        {
            confirmButton.disabled = false;
        } else {
            confirmButton.disabled = true;
        }
    }
    updateConfirmButton();
//__________________________________________________________________
}

function calc_List_discount()
{
    let list_discount = 0;
    total_discount.forEach(one => {
        list_discount += one.t_discount;
    });

    return list_discount.toFixed(2);
}

function calc_List_price()
{
    let list_price = 0;
    total_price.forEach(one => {
        list_price += one.t_price;
    });

    return list_price.toFixed(2);
}

function calc_List_qty()
{
    let list_qty = 0;
    items.forEach(one => {
        list_qty += one.qty;
    });

    return list_qty.toFixed(2);
}

function calc_List_max_price()
{
    let list_max = 0;
    items.forEach(one => {
        list_max += one.price * one.qty;
    });
    return list_max.toFixed(2);
}

function clearItem(index)
{
    if (index > -1) {
        // Remove the item and its corresponding discount and price from the arrays
        items.splice(index, 1);
        total_discount.splice(index, 1);
        total_price.splice(index, 1);

        // Update the bill display
        updateBill();
    }
}





//_________________________Validation Form___________________________

    function validate_items(x, y)
    {
        const err6 = document.getElementById('error6');

        if(y === ''|| y<=0)
        {
            err6.textContent = 'Enter valid quantity';
            // console.log('have errors');
        }
        else if(y>x)
        {
            err6.textContent = 'Maximum items exceeded';
        }
        else
        {
            err6.textContent='';
            // console.log('no erroresss');
            return true;
        }
    }


