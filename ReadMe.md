Read this: https://www.the-art-of-web.com/html/table-markup/
SELECT train.trainID, train.DepartureDate FROM train WHERE train.EndStation = (SELECT station.ID FROM station WHERE station.City LIKE "oshawa")
