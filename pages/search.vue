<template>
    <section>
        <div class="container page_container">
            <h1>Поиск по запросу: <span v-if = "trueSearchStrBrand !== ''">{{trueSearchStrBrand}} -</span> {{trueSearchStr}}</h1>
            <div v-show="showLoad" class = "pageloader">
                <loaderbig></loaderbig>
            </div>


            <div v-if = "(trueSearchStr !== '') && (trueSearchStrBrand === '') && (!showLoad)">        
                <div class = "brandsWraper">
                    <div class=" brandElement" v-for="(item, index) in brandSearchResult" :key = "index" @click.prevent="goToPartsList(item.producer)">
                        <span class="cellBrend cellProducer">{{item.producer}}</span>
                        <span class="cellBrend cellArticle">{{item.article}}</span>
                        <span class="cellBrend cellIdent">{{item.ident}}</span>
                        <span class="cellBrend cellManaged">
                            <p v-show="false" class="loadElem">
                                <loader></loader>
                            </p>
                            <p class="showAllTov"></p>
                        </span>
                    </div>
                </div>
                <p v-show="(brandSearchResult.length == 0) && (showLoad == false)" class = "noSerchResult">
                    По вашему запросу ничего не найдено
                </p>
            </div>
            
            <div v-if = "(trueSearchStr != '') && (trueSearchStrBrand != '') && (!showLoad)">
                
                <div class = "filterPanel">
                    <div class = "filterPanelWrapper">
                        <nuxt-link class = "standartButton" :to = "{path: '/search', query: {qs: this.trueSearchStr}}">&#8617; Вернуться к поиску по: {{trueSearchStr}}</nuxt-link>
                    </div>
                    <h2>Фильтры:</h2>
                    
                    <div class = "formPanel">
                        <form action="" class="filter">
                            <label for = "filterPriceMin">Цена от</label>
                            <input type = "number" @change="filtresParts()" v-model = "filterMinPrice"  :min="totalMinPrice" :max = "totalMaxPrice" placeholder = "Цена от" name = "filterPriceMin" id = "filterPriceMin"/>    
                            <label for = "filterPriceMax">до</label>
                            <input type = "number" @change="filtresParts()" v-model = "filterMaxPrice" :min="totalMinPrice" :max = "totalMaxPrice" placeholder = "Цена до" name = "filterPriceMax" id = "filterPriceMax"/>    
                            
                            <label for = "filterDeliveryMax">Срок поставки до</label>
                            <input type = "number" @change="filtresParts()" v-model = "filterMaxDelivery" :min="totalMinDelivery" :max = "totalMaxDelivery" placeholder = "Время доставки до" name = "filterDeliveryMax" id = "filterDeliveryMax"/>    
                        </form> 
                    </div>

                    <h3>Бренды:</h3>

                    <div class = "brandSelectPanel">
                        <div v-for="(item, name, index) in partSearchResult" :key = "index" @click.prevent="addToFilterList(item.brend)" :class = "[((index > 5)&&(showAll != false))?'dontTisplay':'display', (brandList.includes(item.brend))?'selected':'']" class = "bsElem">
                            ({{item.count}}) <strong>{{item.brend}}</strong> от {{item.minprice}} р.
                        </div>
                    </div>
                    <p>
                        <a v-if = "showAll" href="" @click.prevent="showAll = !showAll" class="showAll">Показать все бренды...</a>
                        <a v-else href="" @click.prevent="showAll = !showAll" class="showAll">Скрыть бренды</a>


                    </p>
                </div>

                <div v-for="(itemBig, indexBig) in sortedPartsResult" :key = "indexBig" class = "tableWraper">
                    <div v-if = "brandList.length == 0 || brandList.includes(itemBig.brend)" class = "partTable">
                        <div v-if = "itemBig.items.length !== 0" class = "partTableR partTableH">
                            <div class = "ptAll ptNameBig"><b>{{itemBig.brend}}</b> {{itemBig.code}}</div>
                            <div class = "ptAll ptCount">Колличество</div>
                            <div class = "ptAll ptDate">Время</div>
                            <div class = "ptAll ptPrice">Цена (руб.)</div>
                            <div class = "ptAll ptMenedge">&nbsp;</div>
                        </div>

                        <div v-for="(item, index) in itemBig.items" :key = "index" class = "partTableR partTableBody">
                            <div class = "ptAll ptBodyAll ptNameBig">{{item.caption}}</div>
                            <div class = "ptAll ptBodyAll ptCount">{{item.rest}}</div>
                            <div class = "ptAll ptBodyAll ptDate">{{item.deliverydays}}</div>
                            <div class = "ptAll ptBodyAll ptPrice">{{item.price}}</div>
                            <div class = "ptAll ptMenedge">
                                <div class="bascetBtn"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div v-if = "(trueSearchStr == '') && (trueSearchStrBrand == '')">
                <p>Не переданы параметры для поиска</p>
            </div>
        </div>
    </section>
</template>

<script>
import loader from '../components/loader.vue';
    export default {
  components: { loader },
        data() {
            return{
                trueSearchStr:'',
                trueSearchStrBrand:'',
                showLoad:false,  

                brandSearchResult:[],
                partSearchResult:[],
                sortedPartsResult:[],
                
                totalMinPrice: 0,
                totalMaxPrice: 0,
                
                filterMinPrice: 0,
                filterMaxPrice: 0,

                totalMinDelivery: 0,
                totalMaxDelivery: 0,

                filterMaxDelivery: 0,

                showAll:true,

                brandList:[]
            }
        },


        mounted: function () {
            
            this.trueSearchStr = this.$route.query.qs==undefined?'':this.$route.query.qs;
            this.trueSearchStrBrand = this.$route.query.brand==undefined?'':this.$route.query.brand;
            
            if ((this.trueSearchStr != "")&&(this.trueSearchStrBrand == ""))
                this.doSearch();

            if ((this.trueSearchStr != "")&&(this.trueSearchStrBrand != ""))
                    this.doSearchItem();
          },

        watch:{
            $route (to, from){
                 this.trueSearchStr = to.query.qs==undefined?'':to.query.qs;
                 this.trueSearchStrBrand = to.query.brand==undefined?'':to.query.brand;

                 if ((this.trueSearchStr != "")&&(this.trueSearchStrBrand == ""))
                    this.doSearch();

                console.log(this.trueSearchStr);
                console.log(this.trueSearchStrBrand);

                if ((this.trueSearchStr != "")&&(this.trueSearchStrBrand != ""))
                    this.doSearchItem();
            }
        },


        methods: {
            doSearch: function () {
                if (this.trueSearchStr != "") {
                    this.showLoad = true;
                    this.brandSearchResult=[];
                    this.$axios.$get("http://mixkur9v.beget.tech/wp-json/forfrontend/v1/brands?partnumber="+this.trueSearchStr).then( (response) => {
                        this.brandSearchResult = response.obj.data;
                        console.log(this.brandSearchResult);
                        this.showLoad = false;
                    });
                    
                }
            },

            doSearchItem: function() {
                
                if ((this.trueSearchStr != "")&&(this.trueSearchStrBrand != "")) {
                    this.showLoad = true;
                    this.$axios.$get("http://mixkur9v.beget.tech/wp-json/forfrontend/v1/tovars?partnumber="+this.trueSearchStr+"&brand="+this.trueSearchStrBrand).then( (response) => {
                        this.partSearchResult =  Object.assign({},response.obj);
                        this.sortedPartsResult = Object.assign({},response.obj);
                        this.showLoad = false;
                        this.totalMinPrice = response.total_min_price;
                        this.totalMaxPrice = response.total_max_price;
                        
                        this.filterMaxPrice = response.total_max_price;
                        this.filterMinPrice = response.total_min_price;
                        
                        this.totalMinDelivery = response.total_min_delivery;
                        this.totalMaxDelivery = response.total_max_delivery;
                        this.filterMaxDelivery = response.total_max_delivery;
                       
                    });
                }
            },

            goToPartsList: function(searchBrand) {
                 this.$router.push({path: '/search', query: { qs: this.trueSearchStr, brand:searchBrand }})
            },

            filtresParts: function() {
                
               
                for (let key in this.sortedPartsResult)
                    {
                        // this.sortedPartsResult[key]["items"] = this.partSearchResult[key]["items"].slice(0);
                        this.sortedPartsResult[key] = Object.assign({},this.partSearchResult[key]);


                        this.sortedPartsResult[key]["items"] = this.sortedPartsResult[key]["items"].filter(element => {
                            let rez = true;
                            
                            if ((Number(element.price) < this.filterMinPrice)||(Number(element.price) > this.filterMaxPrice))
                                rez = false;
                                
                            if (Number(element.deliverydays_max) > this.filterMaxDelivery)  
                                rez = false;

                            return rez;
                        });

                      
                    }
            },

            addToFilterList: function(brandName) {
                if (this.brandList.includes(brandName))
                {
                    let position = this.brandList.indexOf(brandName);
                    if ( ~position ) this.brandList.splice(position, 1);
                }
                else
                    this.brandList.push(brandName);
                
                console.log(this.brandList);
            }
        }
    }
</script>

<style>

</style>