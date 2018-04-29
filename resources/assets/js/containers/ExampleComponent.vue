<template>
    <div class="container">
        <div v-for="(_cabinets, index) in chunkArray(cabinets, 4)"  :key="index" class="columns">
            <div class="column is-3" v-for="(cabinet, i) in _cabinets" :key="cabinet.id">
                <CabinetBox :cabinet="cabinet" :key="i"/>
            </div>
        </div>
    </div>
</template>

<script>
    const chunkArray = (array, length) => {
        if (length) {
            let newArr = [];
            let temp = [];

            for (let i = 0; i < array.length; i++){
                temp.push(array[i]);
                if ((i+1)%length === 0){
                    newArr.push(temp);
                    temp = [];
                }
            }
            if (temp.length) newArr.push(temp);
            return newArr;
        } else {
            for (let i = 2;i < array.length - 1;i++) {
                if (array.length%i === 0) return chunkArray(array, i);
            }
            return chunkArray(array, 1);
        }
    };

    import axios from 'axios';
    import CabinetBox from '../components/CabinetBox';

    import { API } from "../config";
    export default {
        mounted() {
            this.getCabinets();
        },
        data: function(){
            return {
                cabinets: [],
            };
        },
        methods: {
            chunkArray,
            getCabinets() {
                axios.get(API + 'cabinet/all')
                    .then(({ data }) => {
                        this.cabinets = data.cabinets;
                    });
            },
        },
        components: {CabinetBox}
    }
</script>
