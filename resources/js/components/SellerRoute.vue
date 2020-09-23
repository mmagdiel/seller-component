<template>
    <div id="add">
        <div class="options">
            <dropdown-select :options="data.sellers" :fn="handleSeller" />
            <dropdown-select :options="data.dates" :fn="handleDate" />
            <label for="duration" class="duration">Duration</label>
            <input
                id="duration"
                v-model="duration"
                type="number"
                name="duration"
            />
            <div class="flex">
                <label for="duration" class="duration">Keep at center</label>
                <input
                    id="duration"
                    v-model="keepAtCenter"
                    type="checkbox"
                    name="keepAtCenter"
                />
            </div>
        </div>

        <seller-map
            :duration="durationInteger"
            :keep-at-center="keepAtCenter"
        />
    </div>
</template>

<script>
import Map from "./Map";
import DropdownSelect from "./DropdownSelect";
//import "leaflet/dist/leaflet.css";

export default {
    name: "main-component",
    components: {
        Map,
        DropdownSelect
    },
    data: function() {
        return {
            endpoint: {
                base: "http://127.0.0.1:8000/api/seller"
            },
            data: {
                sellers: [],
                dates: [],
                cordinate: []
            },
            state: {
                seller: "",
                date: ""
            },
            duration: 2000,
            keepAtCenter: false
        };
    },
    created() {
        this.fetchSellers();
    },
    computed: {
        durationInteger() {
            return parseInt(this.duration);
        }
    },
    methods: {
        fetchSellers() {
            const url = this.endpoint.base;
            axios.get(url).then(response => {
                this.data.sellers = response.data.data;
            });
        },
        fetchDates() {
            const url = `${this.endpoint.base}/${this.state.seller}`;
            axios.get(url).then(response => {
                this.data.dates = response.data.data;
            });
        },
        fetchCordinate() {
            const url = `${this.endpoint.base}/${this.state.seller}/${this.state.date}`;
            axios.get(url).then(response => {
                console.log(response.data.data);
                this.data.cordinate = response.data.data;
            });
        },
        handleSeller(e) {
            console.log(e.target.value);
            this.state.seller = e.target.value;
            this.fetchDates();
        },
        handleDate(e) {
            console.log(e.target.value);
            this.state.date = e.target.value;
            this.fetchCordinate();
        }
    }
};
</script>

<style scoped>
#add {
    height: 100%;
    margin: 0;
}

#add {
    display: flex;
}

label {
    margin-top: 20px;
    margin-bottom: 10px;
}

.options {
    padding: 20px;
    min-width: 300px;
    box-shadow: 2px 5px 8px rgba(0, 0, 0, 0.1);
    background-color: #fff;
    display: flex;
    flex-direction: column;
    z-index: 9999;
}

.flex {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

input {
    z-index: 2000;
}
</style>
