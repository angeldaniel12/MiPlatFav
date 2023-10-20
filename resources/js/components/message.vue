<template>
    <div><li class="list-group-item" :class="className"><slot></slot></li>
    <small class="badge float-right" :class="badgesClass"></small>
</div>
</template>

<script>

    export default {
        props: ['color'
    ],
    computed:{
        className(){
            return 'list-group-item-'+this.color;
        },
        badgesClass(){
            return 'badge-' +this.color;
        }
    },
        mounted() {
            console.log('Component mounted.')
        }
    
        
        
        
    }
    // data: {
    //     message: '',
    //     chat: {
    //         message:[]
    //     }
    // },
    // methods:{
    //     send(){
    //         if (this.message.length !=0) {
    //             this.chat.message.push(this.message);
    //             this.message='';
    //         }
    //     }
    // }
</script>
