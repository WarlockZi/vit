import {_, post, Validate} from '../common/common'

_('#email').on('keyup', function () {
    // alert('df');
    var v = new Validate(_('#email').val(), {
        'min':4,
        '!null':true,
        'email':true,
        'max':120
    });
    if (v.errors){
        this.style.background = '#ffe6e6';
    }
    v.errors.forEach((error, index) => {
            alert(error);
        }
    );
    this.style.background = '#f7f7f7';
});