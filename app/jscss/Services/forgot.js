import {_, post, Validator} from '../common/common'

_('.forgot').on('click', function () {
    var v = new Validator(_('#email'), [4, '!null']);
});