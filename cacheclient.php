<html ng-app="controllerapp">
<head>
<title>REST API Analysis</title>
<script type="text/javascript" src="Client/Scripts/angular.js"></script>
</head>
<body>

<div ng-controller="AController as a" id="AController">

<button ng-click="a.fetch()"> Fetch </button>

<button ng-click="a.addNewCountry()"> addNewCountry </button>
<ol>
	<li ng-repeat="country in a.countries">{{country}}</li>
</ol>
</div>

<script type="text/javascript">
	
	angular
	.module('controllerapp',[])
	.controller('AController',AController)
	
	  


	function AController($http,$cacheFactory)
	{
		var ref = this;
		this.cc = $cacheFactory('countries')
		this.cachedInfo = ref.cc.info();
		this.countries = {};

		this.fetch = function()
		{
				 
				if(ref.cachedInfo.size===0) {
					$http.get('cache.php').then(function(res){
						ref.countries = res.data;	
						ref.cc.put('countriescached',res.data)
						ref.cachedInfo.size=1;
				    })
				}
				else {
						ref.countries = ref.cc.get('countriescached')
				}
			

		}

		this.addNewCountry = function(){

			console.log('New Country Added so we should again make http request to fetch and show newly added country');
			ref.cachedInfo.size=0;
			console.log(ref.cachedInfo)

		}
		
	}

</script>

</body>
</html>



