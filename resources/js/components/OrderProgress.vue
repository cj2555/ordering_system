<template>
<div>
    <div  class="progress">
        <progressbar :now="progress" label type="primary" striped animated></progressbar>
</div>

 <div class="order-status">
                        <strong>order status:</strong>
                        {{statusNew}}
                    </div>

</div>
    
</template>

<script>
import { progressbar  } from 'vue-strap'

    export default {
  data () {
    return {
        statusNew:this.status,
        progress:this.initial,
    }
  },
        components:{
            progressbar 
        },

        props:['status','initial','order_id'],
        mounted() {
             Echo.channel('order-tracker.'+this.order_id)
            .listen('OrderStatusChanged', (order) => {
                this.statusNew=order.status_name
                this.progress=order.status_percentage
              
            })
        }
    }
</script>
