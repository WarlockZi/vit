class Validator{
    constructor(arg, constrain){
        this.errors = [];
        if (typeof arg !== 'string' || typeof constrain !== 'object'){
            this.errors.push('Vlidator : not string sent to Valigator!');
        }
        this.arg = arg,
            this.constrain = constrain;
        this.validate();
        return this;
    }
    validate(){
        var c = this.constrain;
        for (let constr of c){
            if (constr === '!null'){
                if (!this.arg.length){
                    this.errors.push('empty');
                }
            }else if(typeof constr === 'number'){
                if (this.arg.length<constr){
                    this.errors.push(`less than ${constr}`);
                }
            }else if(constr === 'email'){
                if (this.arg.indexOf('@')<0)
                {
                    this.errors.push(`not email`);
                }
            }
        }
    }
}
export {Validator};