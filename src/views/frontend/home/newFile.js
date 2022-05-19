import Form from 'vform';

export default (await import('vue')).defineComponent({
data() {
return {
errors: {},
form: new Form({
cus_name: null,
cus_phone: null,
cus_email: null,
cus_address: null,
start_date: null,
end_date: null,
status: '',
}),
};
},
methods: {
resort_update(id) {

axios.post('booking/' + id, this.form)
.then(() => {
this.$router.push({ name: 'home' });
$('#resort_modal').modal('hide');
})
.catch(error => this.errors = error.response.data.errors);


},
},
});
