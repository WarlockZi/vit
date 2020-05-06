import {_} from "./common";

class ajax_body {
    constructor(table = 'user', action = 'read') {
        this.url = '/adminsc',
            this.action = action,
            this.token = _("meta[name = 'token']").toArray()[0].content,
            this.table = this.model = table,
            this.values = {};

        this.ownFields();

        if (_('.shared').objects.length) {
            this.sharedFilds();
        }
        return this;
    }

    ownFields() {
        let vals = _('.field').objects;
        for (var i of vals) {
            this.values[`${i.id}`] = _(i).fullfill();
        }
    };

    sharedFilds() {

        let ids = [];
        let right = _('.shared.right:checked').objects;
        for (let i of right) {
            ids.push(+i.id);
        }
        this.values.shared = {};
        this.values.shared[`right`] = ids;
    }
}

export default ajax_body;