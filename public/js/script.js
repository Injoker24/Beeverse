$(document).ready(function() {
    var max_fields = 5;
    var wrapper = $(".con1");
    var add_button = $(".add-form-field");

    var x = 3;
    $(add_button).click(function(e) {
        e.preventDefault();
        if (x < max_fields) {
            x++;
            if(x == 4){
                $(wrapper).append('<div><div class="form-group"><input type="text" class="form-control" id="interest4" name="interest4" placeholder="Enter work interest 4..."></div><div class="custom-file mb-1"><input type="file" id="interest_image4" name="interest_image4" accept="image/png, image/jpeg"></div><div class="button-danger delete-button mb-3" style="width:100px;">Remove</div></div>');
            }
            else if (x == 5){
                $(wrapper).append('<div><div class="form-group"><input type="text" class="form-control" id="interest5" name="interest5" placeholder="Enter work interest 5..."></div><div class="custom-file mb-1"><input type="file" id="interest_image5" name="interest_image5" accept="image/png, image/jpeg"></div><div class="button-danger delete-button mb-3" style="width:100px;">Remove</div></div>');
            }
        } else {
            alert('You Reached the limits')
        }
    });

    $(wrapper).on("click", ".delete-button", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    })
});
