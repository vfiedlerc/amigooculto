<template>
    <div class="card panel-default">
	    <div class="card-header"><i :class="defineClasse"></i> {{titulo}}</div>
		    <div class="card-body">
                <slot></slot>
		    </div>
    </div>
</template>
<script>
export default {
    props:['titulo','classe'],
    computed:{
        defineClasse:function(){
            if(!this.classe){
                return "fa";
            }
            return this.classe;
        }
    }
}
</script>
