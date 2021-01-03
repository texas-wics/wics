fetch('https://api.rss2json.com/v1/api.json?rss_url=https://medium.com/feed/@wicspresident', {cache: "no-cache"})
   .then((res) => res.json())
   .then((data) => {
       const posts = data.items

       function toText(node) {
         let tag = document.createElement('div')
         tag.innerHTML = node
         node = tag.innerText
         return node
      }
       function shortenText(text,startingPoint ,maxLength) {
       return text.length > maxLength?
          text.slice(startingPoint, maxLength):
          text
      }
		function getYear(text) {
			return text.slice(0,4)
		}
		function getDay(text) {
			let day = text.slice(8,10)
			//if (day.charAt(0) === '0') {
				//return day.charAt(1)
			//}
			return day
		}
		function getMonth(text) {
			let num = text.slice(5,7)

			var month = new Array();
			month[0] = "January";
			month[1] = "February";
			month[2] = "March";
			month[3] = "April";
			month[4] = "May";
			month[5] = "June";
			month[6] = "July";
			month[7] = "August";
			month[8] = "September";
			month[9] = "October";
			month[10] = "November";
			month[11] = "December";

            return month[parseInt(num) - 1]
		}

      let output = '';
      posts.forEach((item) => {
          console.log(item.title);
         output += `
<div class="blog-entry justify-content-end">
          		<div class="text px-4 py-4">
          			<h3 class="heading mb-0"><a href="${item.link}">${item.title}</a></h3>
          		</div>
              <a href="${item.link}" class="block-20" style="background-image: url('${item.thumbnail}');">
              </a>
              <div class="text p-4 float-right d-block">
              	<div class="topper d-flex align-items-center">
              		<div class="one py-2 pl-3 pr-1 align-self-stretch">
              			<span class="day">${getDay(item.pubDate)}</span>
              		</div>
              		<div class="two pl-0 pr-3 py-2 align-self-stretch">
              			<span class="yr">${getYear(item.pubDate)}</span>
              			<span class="mos">${getMonth(item.pubDate)}</span>
              		</div>
              	</div>
                <p>${'...' + shortenText(toText(item.content),60, 200)+ '...'}</p>
                <p><a href="${item.link}" class="btn btn-primary">Read more</a></p>
              </div>
            </div>`
      })
      document.querySelector('.blog__container').innerHTML = output

    })
