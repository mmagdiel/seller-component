<template>
    <label>
        {{ label }}
        <select @change="fn">
            <option value>{{ placeholder }}</option>
            <option
                v-for="option in options"
                :key="option.id"
                :value="option.id"
                >{{ option.name }}</option
            >
        </select>
    </label>
</template>

<script>
export default {
    name: "dropdown-component",
    props: ["options", "fn", "label", "placeholder"]
};
</script>
