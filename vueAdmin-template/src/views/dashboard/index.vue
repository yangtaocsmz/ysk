<template>
  
  <div class="dashboard-container">
    <compoment is:"currentRole"></compoment>
  </div>
</template>

<script>
  import { mapGetters } from "vuex"
  import adminDashboard from "./admin"
  import editorDashboard from './edittor'


  export default{
  name:"dashboard",
  componments: { adminDashboard,editorDashboard },
  data(){

    return {
    currentRole:"adminDashboard"
  }},

  computed:{
    ...mapGetters([
      'roles'
      ])
  },
  created(){
    if(!this.roles.includes('super')){
      this.currentRole = 'editorDashboard'
    }
  }
}
</script>