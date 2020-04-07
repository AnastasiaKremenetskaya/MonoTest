<template>
    <div class="UserFormCreate">
        <form class="form form-horizontal" @submit.prevent="createUser">

            <label class="col-sm-4">ФИО (мин 3 символа)</label>
            <div class="col-sm-12">
                <input
                    v-model="user.full_name"
                    id="full_name"
                    class="form-control"
                    name="full_name"
                    type="text"
                >
            </div>

            <label class="col-sm-1 control-label">Пол</label>
            <div class="col-sm-12">
                <select v-model="user.gender" class="custom-select" name="gender">
                    <option :value="0">Мужской</option>
                    <option :value="1">Женский</option>
                    <option :value="2">Прочее</option>
                </select>
            </div>

            <label class="col-sm-4">Номер телефона</label>
            <div class="col-sm-12">
                <input
                    v-model="user.phone"
                    id="phone"
                    class="form-control"
                    name="phone"
                    type="tel"
                >
            </div>

            <label class="col-sm-1 control-label">Адрес</label>
            <div class="col-sm-12">
                <input id="address"
                       v-model="user.address"
                       class="form-control"
                       name="address"
                       :rules="rules"
                       type="text"
                >
            </div>

            <label class="col-sm-3 control-label"></label>
            <div class="col-sm-9 submitBtn" align="right">
                <button type="submit" class="btn btn-primary">Добавить</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data: () => ({
            rules: [
                value => !!value || 'Required.',
                value => (value && value.length >= 3) || 'Минимум 3 символа',
            ],
            user: {
                full_name: '',
                gender: '',
                phone: '',
                address: ''
            },
            errors: {},
        }),
        props: {
            route: {
                type: String
            }
        }
        ,
        methods: {
            createUser() {
                axios
                    .post('/api/users/store', this.user)
                    // .then(response => (
                    //     self.$router.push({name: '/'});
                    //     console.log(response.data);
                    // ))
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>
