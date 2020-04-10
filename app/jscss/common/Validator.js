class Validator{
    constructor(arg, constrain){
        this.errors = [];
        this.arg = arg,
            this.constrain = constrain;
        validate();
        return this;
    }
    validate(){
        for (let i in this.constrain){
            if (i === '!null'){
                if (!this.arg){
                    this.errors = 'empty';
                }
            }else if(i+1 !== i){
                if (this.arg.length<i){
                    this.errors = "less than ${i}";
                }
            }
        }

    }
}