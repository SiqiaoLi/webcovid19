

    <html>
  <head>
      <title>Select country and date</title>
      <meta charset="utf-8">



  </head>
  <body>
      <div class="container">
          <div id="visual">
              <iframe width="600" height="330" src="https://datastudio.google.com/embed/reporting/c5cdcc11-8ae4-4e20-b647-1b28369206e0/page/2lKPB" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>


          <form action="/covid19" method="post">
              Country: <label>
                  <input type="text" name="country" placeholder="E.g Australia, China">
              </label><br>

                  Day: <label for="day"></label><select id = "day" name="day"  >
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                  <option>6</option>
                  <option>7</option>
                  <option>8</option>
                  <option>9</option>
                  <option>10</option>
                  <option>11</option>
                  <option>12</option>
                  <option>13</option>
                  <option>14</option>
                  <option>15</option>
                  <option>16</option>
                  <option>17</option>
                  <option>18</option>
                  <option>19</option>
                  <option>20</option>
                  <option>21</option>
                  <option>22</option>
                  <option>23</option>
                  <option>24</option>
                  <option>25</option>
                  <option>26</option>
                  <option>27</option>
                  <option>28</option>
                  <option>29</option>
                  <option>30</option>
                  <option>31</option>
                        </select>
                Month: <label for="month"></label><select id = "month" name="month"  >
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                  <option>6</option>
                  <option>7</option>
                  <option>8</option>
                  <option>9</option>
                  <option>10</option>
                  <option>11</option>
                  <option>12</option>
                        </select>
                Year: <select  name="year"  >
                  <option>2020</option>
                  <option>2019</option>
                   </select>

              <input type="submit" value = "search">
          </form>

      </div>
  </body>
    </html>