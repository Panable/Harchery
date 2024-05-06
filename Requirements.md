# Archers

## Scores
- [x] An archer needs to be able to look up their own scores over time.
> Display each round record and total the score on each corresponding arrow


- [ ] Restrict the number of scores by date range and by the type of round.
> CHANGE SQL QUERY ON VIEW


- [ ] Score listings have to be able to be sorted by date and score (generally highest first).
> CHANGE SQL QUERY ON VIEW


- [ ] Archers need to be able to enter their scores into a staging table using a hand-held device.
> For now just use the tables as is (**SHOULD** change eventually)


- [ ] Able to record a date and time, round, equipment.
> Just create a round record, with arrows

- [x] Archers have to be able to look up definitions of rounds, i.e. what ranges make up the round.
> List all 'round' 

- [ ] Archers want to look up club competition results and see how everyone has placed and who shot what score.

> Have page of championships held in club. championship table to match specific clubid
> When click on specific championship, show all results (passing competitionid)
> To show all results, use competitionid to get all competition records linking with round record and archer (tallying up their score like above)


- [ ] The participating rounds and scores have to be defined so that the results can be shown and the winners identified.
> Just a database requirement. already done.

- [ ] Determining an archer’s best score for a round
> Show all round records of an archer, filter unique highest scores for RoundID

- [ ] The club’s best score for a round and the archer who shot it should also be an available lookup.
> Like first requirement, but this time filter by club and sort by highest



## Recorder

- [x] The recorder has to be able to enter new archers, new rounds and new competitions.
> Page for creating archers, page for creating new competitions, page for creating new rounds. Competition is the most complicated and even that's not that complicated.


- [ ] Be able to add new scores that archers have staged on their mobile devices.
> Again with the staging, eventually we should have a separate table for staging, but for now allow them to edit archer scores or something


- [x] Each arrow score has to be able to be identified in terms of whichend it belongs to.
> Database requirement, already done. We can have a page going indepth into the arrows ig?


- [x] Each end has to be identified as to its position in the round score
> **Not entirely sure what this means**

- [x] Some of the scores have to be able to be linked to a competition. Some competitions have to be able to be identified as part of a club championship.
> Done in database.

- [x] The database has to have all the information needed to identify the archer’s division
> Already done, store age, gender, etc.

- [ ] There should be a definition of the default equipment, so that the category can be identified in the absence of user input
> Done in frontend

- [x] The equivalent rounds have to be time-dependent,This would make past competitions invalid, so there needs to be a history.
> Time is being stored in the round records
