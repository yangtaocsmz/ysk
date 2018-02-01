<template>
  <el-row class="panel-group" :gutter="40">
    <el-col :xs="12" :sm="12" :lg="6" class="card-panel-col">
      <div class='card-panel' @click="handleSetLineChartData('newVisitis')">
        <div class="card-panel-icon-wrapper icon-people">
          <svg-icon icon-class="star" class-name="card-panel-icon" />
        </div>
        <div class="card-panel-description">
          <div class="card-panel-text">总检测数</div>
          <count-to class="card-panel-num" :startVal="0" :endVal='12020' :duration="2600"></count-to>次
        </div>
      </div>
    </el-col>
    <el-col :xs="12" :sm="12" :lg="6" class="card-panel-col">
      <div class="card-panel" @click="handleSetLineChartData('messages')">
        <div class="card-panel-icon-wrapper icon-message">
          <svg-icon icon-class="message" class-name="card-panel-icon" />
        </div>
        <div class="card-panel-description">
          <div class="card-panel-text">今日检测数</div>
          <count-to class="card-panel-num" :startVal="0" :endVal="123123" :duration="3000"></count-to>次
        </div>
      </div>
    </el-col>
    <el-col :xs="12" :sm="12" :lg="6" class="card-panel-col">
      <div class="card-panel" @click="handleSetLineChartData('purchases')">
        <div class="card-panel-icon-wrapper icon-money">
          <svg-icon icon-class="peoples" class-name="card-panel-icon" />
        </div>
        <div class="card-panel-description">
          <div class="card-panel-text">总用户数</div>
          <count-to class="card-panel-num" :startVal="0" :endVal="allList.total" :duration="3200"></count-to>人
        </div>
      </div>
    </el-col>
    <el-col :xs="12" :sm="12" :lg="6" class="card-panel-col">
      <div class="card-panel" @click="handleSetLineChartData('shoppings')">
        <div class="card-panel-icon-wrapper icon-shoppingCard">
          <svg-icon icon-class="people" class-name="card-panel-icon" />
        </div>
        <div class="card-panel-description">
          <div class="card-panel-text">今日新增用户数</div>
          <count-to class="card-panel-num" :startVal="0" :endVal="list.total" :duration="3600"></count-to>人
        </div>
      </div>
    </el-col>
  </el-row>
</template>

<script>
import CountTo from 'vue-count-to'
import { cardList } from '@/api/member'
export default {
  components: {
    CountTo
  },
  data() {
    return {
      list: 0,
      allList: 0
    }
  },
  created() {
    this.cardList()
    this.cardAllList()
  },
  methods: {
    handleSetLineChartData(type) {
      this.$emit('handleSetLineChartData', type)
    },
    cardList() {
      const _date = new Date()
      const year = _date.getUTCFullYear()
      const month = _date.getUTCMonth() + 1
      const day = _date.getUTCDate()
      // const date = year + '-' + month + '-' + day

      const _nextDate = new Date(_date.getTime() + 24 * 60 * 60 * 1000)
      const preYear = _nextDate.getUTCFullYear()
      const preMonth = _nextDate.getUTCMonth() + 1
      const preDay = _nextDate.getUTCDate()
      // const preDate = _preDate.getUTCDate()
      const date = year + '-' + month + '-' + day
      const nextDate = preYear + '-' + preMonth + '-' + preDay
      const where = 'RegisterTime < ' + "'" + nextDate + "'" + ' and RegisterTime > ' + "'" + date + "'"
      // const where = "RegisterTime > '2018-01-31' and RegisterTime < '2018-02-02'"
      cardList(0, 20, where).then(response => {
        this.list = response.data
      })
    },

    cardAllList() {
      cardList(0, 5).then(response => {
        this.allList = response.data
      })
    }
  }
}
</script>

<style rel="stylesheet/scss" lang="scss" scoped>
.panel-group {
  margin-top: 18px;
  .card-panel-col{
    margin-bottom: 32px;
  }
  .card-panel {
    height: 108px;
    cursor: pointer;
    font-size: 12px;
    position: relative;
    overflow: hidden;
    color: #666;
    background: #fff;
    box-shadow: 4px 4px 40px rgba(0, 0, 0, .05);
    border-color: rgba(0, 0, 0, .05);
    &:hover {
      .card-panel-icon-wrapper {
        color: #fff;
      }
      .icon-people {
         background: #40c9c6;
      }
      .icon-message {
        background: #36a3f7;
      }
      .icon-money {
        background: #f4516c;
      }
      .icon-shoppingCard {
        background: #34bfa3
      }
    }
    .icon-people {
      color: #40c9c6;
    }
    .icon-message {
      color: #36a3f7;
    }
    .icon-money {
      color: #f4516c;
    }
    .icon-shoppingCard {
      color: #34bfa3
    }
    .card-panel-icon-wrapper {
      float: left;
      margin: 14px 0 0 14px;
      padding: 16px;
      transition: all 0.38s ease-out;
      border-radius: 6px;
    }
    .card-panel-icon {
      float: left;
      font-size: 48px;
    }
    .card-panel-description {
      float: right;
      font-weight: bold;
      margin: 26px;
      margin-left: 0px;
      .card-panel-text {
        line-height: 18px;
        color: rgba(0, 0, 0, 0.45);
        font-size: 16px;
        margin-bottom: 12px;
      }
      .card-panel-num {
        font-size: 20px;
      }
    }
  }
}
</style>
