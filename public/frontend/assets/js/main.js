class Errors {
    constructor (){
        this.errors = {}
    }

    /**
     * Determine if an errors exists for the given field.
     *
     * @param {string} field
     */
    has(field) {
        return this.errors.hasOwnProperty(field);
    }

    /**
     * Determine if we have any errors.
     */
    any() {
        return Object.keys(this.errors).length > 0;
    }


    get(field){
        if(this.errors[field]){
            return this.errors[field][0];
        }
    }

    record (errors){
        this.errors = errors;
    }

    
    /**
     * Clear one or all error fields.
     *
     * @param {string|null} field
     */
    clear(field) {
        if (field) {
            delete this.errors[field];
            return;
        }

        this.errors = {};
    }
}

new Vue({
    el: '#app',
    data() {
        return { 
            first_name: '',
            landing_page: window.location.pathname,
            last_name: '',
            email: '',
            phone_number: '',
            errors: new Errors(),
            output: '',
            success: false,
            loading: false,
            programs:[],
            first_choice:'',
            utm_source:document.getElementById('utm_source').value,
            utm_medium:document.getElementById('utm_source').value,
          application_type:'UndergraduatePrograms'
        };
    },

    
    methods: {
         getJsonCourses: function(){
            axios.get('/getJsonCourses',{
                params: {
                    application_type: this.application_type
                }
             })
            .then(function (response) {
                //console.log(response);
               this.programs = response.data.DATA;
            }.bind(this));

          },

        getCourses: function(){
            axios.get('/getCourses',{
                params: {
                    application_type: this.application_type
                }
             })
            .then(function (response) {
                //console.log(response.data.DATA);
               this.programs = response.data.DATA;
            }.bind(this));

          },
        
        formSubmit(e) {
            this.loading = true,
            e.preventDefault();
            let currentObj = this;
            axios.post('/applicant/create', {
                first_name: this.first_name,
                last_name: this.last_name,
                phone_number: this.phone_number,
                landing_page: this.landing_page,
                application_type: this.application_type,
                first_choice: this.first_choice,
                utm_source:document.getElementById('utm_source').value,
                utm_medium:document.getElementById('utm_medium').value,
                utm_campaign:document.getElementById('utm_campaign').value,
                email: this.email
            })
            .then(function (response) {
                currentObj.success = true;
                currentObj.output = response.data.message;
                //window.location.href = response.data.redirect;
            })
            .catch(error => this.errors.record(error.response.data.errors))
            .finally(() => {
                currentObj.loading =  false
            });
        }
    },
    created: function(){
        this.getJsonCourses()
    }

})