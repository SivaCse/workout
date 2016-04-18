<html ng-app="controllerapp">
<head>
<title>REST API Analysis</title>
<script type="text/javascript" src="Client/Scripts/angular.js"></script>
</head>
<body>

<div ng-controller="AController as a" id="AController">

<button ng-init="a.init()"> </button>

<button ng-click="a.addNewCountry()"> addNewCountry </button>
<ol id="list">
	<li ng-repeat="country in a.countries track by $index">{{country}}</li>
</ol>
</div>

<script type="text/javascript">
	
	angular
	.module('controllerapp',[])
	.controller('AController',AController)
	
	
   


	function AController($http,$cacheFactory)
	{
		var ref = this;
		this.countries = {};


		this.init = function() {

			ref.fetch();
		}

		this.fetch = function()
		{
				if(ref.getLocalStorage()=='null') {
					$http.get('cache.php').then(function(res){
						ref.countries = res.data;	
						ref.setLocalStorage(res.data);
				    })
				}
				else {
						ref.countries = ref.getLocalStorage();
				}


			

		}


		this.setLocalStorage = function(data) {

			localStorage.setItem('countries',data)
		}

		this.getLocalStorage = function() {

			if(localStorage.getItem('countries')!='null' || localStorage.getItem('countries')!==null)
			return localStorage.getItem('countries').split(',')
			else
				return 'null';
		}

		this.addNewCountry = function(){

			console.log('New Country Added so we should again make http request to fetch and show newly added country');
			localStorage.setItem('countries',null)

		}
		
	}

</script>

</body>
</html>



