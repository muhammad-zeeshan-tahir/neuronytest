<template>
  <div>
    <div class="p-10">
      <h1 class="text-4xl font-bold">Candidates</h1>
    </div>
    <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">
      <div v-for="candidate in candidates" :class="{ hidden: knowsWordpress(candidate) }"
           class="rounded
                  overflow-hidden
                  shadow-lg"
      >
        <img alt="" class="w-full" src="/avatar.png">
        <div class="px-6 py-4">
          <div class="font-bold text-xl mb-2">{{ candidate.name }}</div>
          <p class="text-gray-700 text-base">{{ candidate.description }}</p>
        </div>
        <div class="px-6 pt-4 pb-2">
          <span v-for="strength in JSON.parse(candidate.strengths)"
                :class="badgeStrengthClass(strength)"
                class="inline-block
                       bg-gray-200
                       rounded-full
                       px-3 py-1 text-sm
                       font-semibold
                       text-gray-700 mr-2 mb-2"
          >
            {{ strength }}
          </span>
        </div>
        <div class="px-6 pb-2">
          <span v-for="skill in JSON.parse(candidate.soft_skills)"
                :class="badgeSkillClass(skill)"
                class="inline-block
                       bg-gray-200
                       rounded-full
                       px-3 py-1 text-sm
                       font-semibold
                       text-gray-700 mr-2 mb-2"
          >
            {{skill }}
          </span>
        </div>
        <div class="p-6 float-right">
          <button
                 @click="contactCandidate(candidate.email)"
                 class="bg-white
                        hover:bg-gray-100
                        text-gray-800
                        font-semibold py-2 px-4
                        border border-gray-400
                        rounded shadow"
          >
            Contact
          </button>
          <button
                 @click="hireCandidate(candidate.email)"
                 class="bg-white
                        hover:bg-gray-100
                        text-gray-800
                        font-semibold py-2 px-4
                        border border-gray-400
                        hover:bg-teal-100 rounded shadow"
          >
            Hire
          </button>
        </div>
      </div>
    </div>

    <MvpCandidates></MvpCandidates>

  </div>
</template>

<script>
import MvpCandidates from "./MvpCandidates.vue";
import Toasted from 'vue-toasted';
Vue.use(Toasted);

export default {
  components: {MvpCandidates},
  props: ['candidates'],
  methods: {
    knowsWordpress(candidate) {
      let strengths = JSON.parse(candidate.strengths);
      return strengths.includes('Wordpress');
    },
    badgeStrengthClass(strength) {
      return {
        'bg-teal-100': this.desiredStrengths.includes(strength)
      };
    },
    badgeSkillClass(skill) {
      return {
        'bg-teal-100': this.desiredSkills.includes(skill)
      };
    },
    contactCandidate(email) {
      axios.post('api/candidates-contact',{ email: email })
          .then(response => {
            this.$toasted.success(response.data.message, {
              position: 'bottom-center',
              duration: 3000
            });
          })
          .catch(error => {
            this.$toasted.error(response.data.message, {
              position: 'bottom-center',
              duration: 3000
            });
          });
    },
    hireCandidate(email) {
      axios.post('api/candidates-hire', { email: email })
          .then(response => {
            this.$toasted.success(response.data.message, {
              position: 'bottom-center',
              duration: 3000
            });
          })
          .catch(error => {
            this.$toasted.error(response.data.message, {
              position: 'bottom-center',
              duration: 3000
            });
          });
    }
  },
  data() {
    return {
      desiredStrengths: [
        'Vue.js', 'Laravel', 'PHP', 'TailwindCSS'
      ],
      desiredSkills: [
        'Leadership', 'Team player'
      ]
    }
  },
}
</script>
