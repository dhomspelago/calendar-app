<template>
  <div class="lg:grid lg:grid-cols-3 lg:gap-4">
    <div class="input-side">
      <div class="mb-4 my-event">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="event">
          My Event
        </label>
        <input
          id="event" type="text"
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          v-model="form.event"
        >
      </div>
      <div class="mb-4 date">
        <div class=" grid grid-cols-2 gap-2">
          <div>
            <label class="block text-gray-700 text-sm font-bold mb-2">
              From
            </label>
            <date-picker v-model="form.dateFrom" />
          </div>
          <div>
            <label class="block text-gray-700 text-sm font-bold mb-2">
              To
            </label>
            <date-picker v-model="form.dateTo"/>
          </div>
        </div>
      </div>
      <div class="mb-4 days grid xl:grid-cols-7 grid-cols-3">
        <div class="monday">
          <input id="monday" type="checkbox" value="Mon" v-model="form.mon">
          <label class="text-gray-700 text-sm font-bold" for="monday">
            Mon
          </label>
        </div>
        <div class="tuesday">
          <input id="tuesday" type="checkbox" value="Tue" v-model="form.tue">
          <label class="text-gray-700 text-sm font-bold" for="tuesday">
            Tue
          </label>
        </div>
        <div class="wednesday">
          <input id="wednesday" type="checkbox" value="Wed" v-model="form.wed">
          <label class="text-gray-700 text-sm font-bold" for="wednesday">
            Wed
          </label>
        </div>
        <div class="thursday">
          <input id="thursday" type="checkbox" value="Thu" v-model="form.thu">
          <label class="text-gray-700 text-sm font-bold" for="thursday">
            Thu
          </label>
        </div>
        <div class="friday">
          <input id="friday" type="checkbox" value="Fri" v-model="form.fri">
          <label class="text-gray-700 text-sm font-bold" for="friday">
            Fri
          </label>
        </div>
        <div class="saturday">
          <input id="saturday" type="checkbox" value="Sat" v-model="form.sat">
          <label class="text-gray-700 text-sm font-bold" for="saturday">
            Sat
          </label>
        </div>
        <div class="sunday">
          <input id="sunday" type="checkbox" value="Sun" v-model="form.sun">
          <label class="text-gray-700 text-sm font-bold" for="sunday">
            Sun
          </label>
        </div>
      </div>
      <div class="mb-4">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
          Save
        </button>
      </div>
    </div>
    <div class="col-span-2 calendar-side">
      <div class="mb-4">
        <h1 class="text-3xl font-bold">Jul 2021</h1>
      </div>
      <div class="table w-full">
        <div class="py-4 border-b-2 border-t-2 border-gray-300 grid grid-cols-3 gap-2">
          <div class="date">
            1 Sun
          </div>
          <div class="my-event col-span-2">
            My Event
          </div>
        </div>
        <div class="py-4 border-b-2 border-gray-300 grid grid-cols-3 gap-2 bg-green-100">
          <div class="date">
            1 Sun
          </div>
          <div class="my-event col-span-2">
            My Event
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import DatePicker from 'vue2-datepicker'
  import 'vue2-datepicker/index.css'

  export default {
    name: 'Calendar',
    components: {
      DatePicker,
    },
    data () {
      return {
        form: {
          event: null,
          dateFrom: null,
          dateTo: null,
          mon: null,
          tue: null,
          wed: null,
          thu: null,
          fri: null,
          sat: null,
          sun: null
        }
      }
    }
  }
</script>

<style scoped>
  .mx-datepicker {
    width: 100% !important;
  }

</style>
