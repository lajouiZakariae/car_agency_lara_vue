import axios from "axios";
import { onMounted, ref } from "vue";

export default function useFetchCar() {
    const loading = ref(true),
        error = ref(false),
        cars = ref(null);

    const getCars = async () => {
        const { data } = await axios.get("/api/cars/overview").catch((err) => {
            if (err) {
                loading.value = false;
                error.value = true;
            }
        });
        console.log(data);
        loading.value = false;
        cars.value = data.data;
    };
    onMounted(() => getCars());
    return { loading, error, cars };
}
