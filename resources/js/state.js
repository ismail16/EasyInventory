

export const storage = {

	state:{
		setting:[],
		inventory:[],
		cart:[]
	},
	getters:{
		getSetting(state){
			return state.setting
		},
		getInventory(state){
			return state.inventory
		},
		getCart(state){
			return state.cart
		}
	},
	mutations:{
		setSetting(state, payload){
			state.setting = payload
		},

		setInventory(state, payload){
			state.inventory = payload
		},
		addToCart(state, payload){
			state.cart.push(payload)
		},
		removeItem(state, payload){
			state.cart.splice(payload,1)
		},
		clearCart(state){
			state.cart = []
		}
	},

	actions:{
		setSetting(contex, payload){
			contex.commit('setting',payload)
		},

		addToCart(contex, payload){
			contex.commit('addToCart',payload)
		}
	}
}