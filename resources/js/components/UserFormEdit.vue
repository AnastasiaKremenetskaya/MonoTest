<template>
    <div class="UserFormEdit">
        <form class="form form-horizontal" @submit.prevent="editUser">

            <label class="col-sm-1 control-label">Клиент</label>


            <div class="col-sm-12">
                <select v-model="car.user_id" class="custom-select" name="user_id">
                    <option v-for="item in users" :value="item.id">{{item.full_name}}</option>
                </select>
            </div>

            <label class="col-sm-1 control-label">Марка</label>
            <div class="col-sm-12">
                <input v-model="car.make" id="make" class="form-control" name="make"
                       type="text">
                <div v-if="errors" class="text-danger">{{ errors }}</div>
            </div>

            <label class="col-sm-1 control-label">Модель</label>
            <div class="col-sm-12">
                <input id="model"
                       class="form-control"
                       name="model"
                       v-model="car.model"
                       :rules="rules"
                       type="text"
                >
            </div>

            <label class="col-sm-4">Цвет кузова</label>
            <div class="col-sm-12">
                <input id="colour" class="form-control" name="colour" v-model="car.colour"
                       type="text">
            </div>

            <label class="col-sm-4">Гос Номер РФ</label>
            <div class="col-sm-12">
                <input id="license_plate_number" class="form-control" name="license_plate_number"
                       v-model="car.license_plate_number"
                       type="number">
            </div>

            <label class="col-sm-4">Присутствует на стоянке?</label>
            <div class="col-xs-4 col-sm-3">
                <div class="input-group form_element">
                    <div class="slideTwo">
                        <input type="checkbox" value="false" class="form-control" id="is_on_parking"
                               v-model="car.is_on_parking"
                               name="is_on_parking"
                               :checked="car.is_on_parking === true">
                        <label for="is_on_parking"></label>
                    </div>
                </div>
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
            errors: {},
        }),
        props: {
            users: {
                type: Array,
            }
            ,
            car: {
                type: Object,
            }
            ,
            route: {
                type: String
            }
        }
        ,
        methods: {
            editCar() {
                axios
                    .post('/api/cars/update/' + this.car.id, this.car)
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
