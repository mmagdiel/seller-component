<template>
    <div id="add">
        <div class="options">
            <h1>Los caminos de los vendedores</h1>
            <div v-if="map.areRequired && map.areAbled">
                <h3>La ruta recorrida el {{ state.date }} fue la siguiente</h3>
            </div>
            <div v-else-if="map.areRequired || map.areAbled">
                <h2>No se tiene registros para ese vendedor en esa fecha</h2>
            </div>
            <div v-else>
                <h2>Por favor seleccione un vendedor y una fecha</h2>
            </div>
            <dropdown-select
                :label="labels.seller"
                :placeholder="placeholders.seller"
                :options="data.sellers"
                :fn="handleSeller"
            />
            <dropdown-select
                :label="labels.date"
                :placeholder="placeholders.date"
                :options="data.dates"
                :fn="handleDate"
            />
            <label for="duration" class="duration">
                Duración de recorrido (ms)
                <input
                    id="duration"
                    v-model="map.duration"
                    type="number"
                    name="duration"
                />
            </label>
            <div class="flex">
                <label for="keepAtCenter" class="duration">
                    Seguir el recorrido
                    <input
                        id="keepAtCenter"
                        v-model="map.keepAtCenter"
                        type="checkbox"
                        name="keepAtCenter"
                    />
                </label>
            </div>
        </div>
        <seller-map
            :duration="map.durationInteger"
            :keep-at-center="map.keepAtCenter"
            :latitude="calcLatitude"
            :longitude="calcLongitude"
            :cordinate="calCordinate"
        />
    </div>
</template>

<script>
import Map from "./Map";
import DropdownSelect from "./DropdownSelect";

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
            defaultValues: {
                latitude: 48.8929425,
                longitude: 2.3821873,
                cordinate: [
                    {
                        next: 1,
                        latitude: 48.892924902316985,
                        longitude: 2.378549462213204
                    },
                    {
                        next: 2,
                        latitude: 48.89726152313493,
                        longitude: 2.3786591239469845
                    },
                    {
                        next: 3,
                        latitude: 48.884766340253655,
                        longitude: 2.385254903841032
                    },
                    {
                        next: 4,
                        latitude: 48.90197202575776,
                        longitude: 2.3811537380218444
                    },
                    {
                        next: 0,
                        latitude: 48.90135077760079,
                        longitude: 2.391390677118333
                    }
                ]
            },
            labels: {
                seller: "Vendedor",
                date: "Fechas"
            },
            placeholders: {
                seller: "Seleccione un vendedor",
                date: "Seleccione una fecha"
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
            map: {
                areRequired: false,
                areAbled: false,
                duration: 2000,
                keepAtCenter: false
            }
        };
    },
    created() {
        this.fetchSellers();
    },
    computed: {
        durationInteger() {
            return parseInt(this.map.duration);
        },
        calcLatitude() {
            return this.data.cordinate.length == 0
                ? this.defaultValues.latitude
                : this.data.cordinate[0].latitude;
        },
        calcLongitude() {
            return this.data.cordinate.length == 0
                ? this.defaultValues.longitude
                : this.data.cordinate[0].longitude;
        },
        calCordinate() {
            return this.data.cordinate.length == 0
                ? this.defaultValues.cordinate
                : this.data.cordinate.map((el, i) => ({
                      ...el,
                      next: (i + 1) % this.data.cordinate.length
                  }));
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
                this.data.cordinate = response.data.data.map(el => ({
                    latitude: parseFloat(el.latitude),
                    longitude: parseFloat(el.longitude)
                }));
                this.map.areAbled =
                    response.data.data.length > 0 ? true : false;
                this.map.areRequired = true;
                console.log(this.map.areAbled, this.map.areRequired);
            });
        },
        handleSeller(e) {
            this.state.seller = e.target.value;
            this.fetchDates();
        },
        handleDate(e) {
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
    width: 300px;
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
