SET FOREIGN_KEY_CHECKS = 0;

-- Insert statements for Competition table
INSERT INTO Competition (Name) VALUES 
('Summer Tournament'),
('Winter Classic'),
('Spring Cup');

-- Insert statements for Class table
INSERT INTO Class (AgeGroup, Gender) VALUES 
('Adult', 'Male'),
('Youth', 'Female'),
('Junior', 'Male'),
('Open', 'Female'),
('Open', 'Male'),
('50+',	'Female'),
('50+',	'Male'),
('60+',	'Female'),
('60+',	'Male'),
('70+',	'Female'),
('70+',	'Male'),
('Under 21', 'Female'),
('Under 21', 'Male'),
('Under 18', 'Male'),
('Under 16', 'Female'),
('Under 16', 'Male'),
('Under 14', 'Female'),
('Under 14', 'Male');

-- Insert statements for Division table
INSERT INTO Division (Equipment) VALUES 
('Recurve'),
('Compound'),
('Recurve Barebow'),
('Compound Barebow'),
('Longbow');

-- Insert statements for Round table
INSERT INTO `Round` (Name, `Range`, TotalEnds, Face) VALUES 
('WA90/1440', 90, 6, 120),
('WA90/1440', 70, 6, 120),
('WA90/1440', 50, 6, 80),
('WA90/1440', 30, 6, 80);

-- Insert statements for Club table
INSERT INTO Club (Name, State) VALUES 
('Kew City Bowmen', 'VIC'),
('Mt Evelyn Archery', 'QLD'),
('Canberra Archery Club', 'ACT'),
('Victoria National Archery Club', 'VIC'),
('Box Hill City Club', 'VIC'),
('Bondi Archers Inc.', 'NSW'),
('Coast Archers', 'NSW'),
('Coast Archers', 'NSW'),
('Yarra Valley Archery Park', 'NSW'),
('Aussie Alps Archery Association', 'NSW'),
('Coastal Koala Archers', 'NSW'),
('Top End Target Team', 'TAS'),
('Top End Targets', 'NSW'),
('Red Centre Archery Club', 'NSW'),
('Aussie Arrowheads Club', 'SA'),
('Eucalyptus Arrows Association', 'NSW'),
('Archery Club', 'NSW'),
('Northern Territory Bullseyes', 'SA'),
('Murray River Marksmen', 'NSW'),
('Kangaroo Island Archers', 'TAS'),
('Outback Ochre Archers', 'NSW'),
('Aussie Outdoors Archery Club', 'VIC'),
('Sydney Harbour Archers', 'NSW'),
('Reefside Rangers', 'VIC'),
('Whitsunday Whizzers', 'TAS'),
('Emu Plains Archery Club', 'WA'),
('Top End Targets', 'VIC'),
('Aussie Oak Archers', 'NSW'),
('Yabby Yards Archery Association', 'TAS'),
('Bunya Bullseyes', 'NSW'),
('Sydney Sights Archery Society', 'TAS'),
('Rogue Archery', 'NSW'),
('Alice Springs Archery Association', 'TAS'),
('Sydney Surrounds Archery Society', 'NSW'),
('Aussie Adventure Archery Association', 'TAS'),
('Great Dividing Range Archery Club', 'NSW'),
('Yarra Bowmen Inc.', 'VIC'),
('Northern Territory Bullseyes', 'NSW'),
('Tasmanian Target Tribe', 'NSW'),
('Coral Coast Archers', 'SA'),
('Bushland Bullseye Club', 'SA'),
('Barossa Valley Bowmen', 'NSW'),
('Aussie Outback Archers', 'NSW'),
('Box Hill City Club', 'NSW'),
('Queensland Quiver Club', 'TAS'),
('Aussie Arrow Alliance', 'TAS'),
('Northern Territory Bullseyes', 'NSW'),
('Southern Star Shooters', 'QLD'),
('Top End Target Team', 'NSW'),
('Yabby Yards Archery Association', 'NSW'),
('Kimberley Archery Society', 'TAS'),
('Boomerang Bullseyes', 'NSW'),
('Red Desert Bowmen', 'TAS'),
('Aussie Outback Archers', 'TAS'),
('Aussie Bushland Bowmen', 'TAS'),
('Coastal Koala Archers', 'SA'),
('Sydney Harbour Archers', 'NSW'),
('Aussie Arrowheads Club', 'NSW'),
('Coastal Crest Archery Society', 'NSW'),
('Aussie Alps Archery Association', 'TAS'),
('Kangaroo Point Archery Club', 'NSW'),
('Northern Territory Bullseyes', 'NSW'),
('Emu Plains Archery Club', 'NSW'),
('Yarra Bowmen Inc.', 'SA'),
('Wattle Wanderers Archery Club', 'WA'),
('Yarra Bowmen Inc.', 'NSW'),
('Murray-Darling Marksmen', 'SA'),
('Outback Ochre Archers', 'NSW'),
('Alice Springs Archery Association', 'NSW'),
('Bluewater Bowmen', 'NSW'),
('Blue Gum Bowmen', 'NSW'),
('Surfside Shooters', 'VIC'),
('Box Hill City Club', 'NSW'),
('Reefside Robin Hoods', 'TAS'),
('Reefside Rangers', 'TAS'),
('Whitsunday Whizzers', 'NSW'),
('Coral Sea Shooters', 'NSW'),
('Gumtree Grove Archery Club', 'NSW'),
('Kimberley Archery Society', 'QLD'),
('Southern Cross Bowmen', 'SA'),
('Bunya Bullseyes', 'NSW'),
('Ironbark Archers', 'NSW'),
('Aussie Bow Benders', 'NSW'),
('Great Barrier Archers', 'SA'),
('Koala Archer Alliance', 'NSW'),
('Top End Target Team', 'QLD'),
('Aussie Bushland Bowmen', 'WA'),
('Bluewater Bowmen', 'NSW'),
('Alice Springs Archery Association', 'WA'),
('Bushland Bullseye Club', 'SA'),
('Tropical Territory Archery Club', 'NSW'),
('Coastal Crest Archery Society', 'TAS'),
('Murray Mallee Marksmen', 'NSW'),
('Blue Gum Bowmen', 'SA'),
('Red Desert Bowmen', 'NSW'),
('Boomerang Bullseyes', 'NSW'),
('Aussie Arrow Alliance', 'WA'),
('Golden Wattle Archers', 'TAS'),
('Emu Plains Archery Club', 'NSW'),
('Ironbark Archers', 'TAS'),
('Barossa Valley Bowmen', 'SA'),
('Southern Cross Bowmen', 'TAS'),
('Aussie Arrow Artists', 'NSW'),
('Aussie Arrow Artists', 'VIC'),
('Aussie Alps Archery Association', 'NSW'),
('Coral Coast Archers', 'SA'),
('Tropical Territory Archery Club', 'SA'),
('Aussie Outback Archers', 'NSW'),
('Waverley City Archers Inc.', 'NSW'),
('Sherbrooke Archers', 'TAS'),
('Coral Sea Shooters', 'NSW'),
('Lilydale Bowmen', 'WA'),
('Bunyip Bush Bowmen', 'SA'),
('Murray Mallee Marksmen', 'NSW'),
('Moorawin Archery Club', 'NSW'),
('Murray-Darling Marksmen', 'VIC'),
('Tropical Territory Archery Club', 'NSW'),
('Sunburnt Sky Archers', 'NSW'),
('Dingo Downs Archery Alliance', 'NSW'),
('Boomerang Bullseyes', 'SA'),
('Reefside Robin Hoods', 'NSW'),
('Bondi Archers Inc.', 'NSW'),
('Sydney Sights Archery Society', 'SA'),
('Bushland Bullseye Club', 'SA'),
('Outback Ochre Archers', 'NSW'),
('Snowy Mountains Archery Club', 'NSW'),
('Yarra Valley Archery Park', 'WA'),
('Morrabin Archery Club', 'TAS'),
('Yarra Bowmen Inc.', 'NSW'),
('Bunyip Bush Bowmen', 'NSW'),
('Whitsunday Whizzers', 'NSW'),
('Northern Territory Bullseyes', 'NSW'),
('Murray-Darling Marksmen', 'TAS'),
('Reefside Rangers', 'NSW'),
('Outback Oasis Archery Club', 'WA'),
('Abbey Archery', 'WA'),
('Tasmanian Target Tribe', 'NSW'),
('Red Desert Bowmen', 'WA'),
('Apex Hunting', 'SA'),
('Great Southern Snipers', 'NSW'),
('Koala Archer Alliance', 'NSW'),
('Murray River Marksmen', 'ACT'),
('Barossa Valley Bowmen', 'NSW'),
('Gold Coast Bowmen', 'SA'),
('Coral Coast Archers', 'SA'),
('Eucalyptus Arrows Association', 'SA'),
('Outback Oasis Archery Club', 'NSW'),
('Aussie Arid Archers', 'NSW'),
('Gold Rush Archery Club', 'QLD'),
('Victoria Archery Club', 'VIC'),
('Coastal Crest Archery Society', 'SA'),
('Eucalyptus Arrows Association', 'NSW'),
('Boomerang Bullseyes', 'NSW'),
('Gold Coast Bowmen', 'SA'),
('Tasmanian Target Tribe', 'TAS'),
('Kangaroo Point Archery Club', 'NSW'),
('Dingo Downs Archery Alliance', 'SA'),
('Koala Archer Alliance', 'TAS'),
('Coastal Crest Archery Society', 'NSW'),
('Box Hill City Club', 'NSW'),
('Waverley City Archers Inc.', 'TAS'),
('Wombat Wilderness Archers', 'SA'),
('Rainbow Archery Alliance', 'NSW'),
('Sydney Sights Archery Society', 'NSW'),
('Waverley City Archers Inc.', 'NSW'),
('Coral Coast Archers', 'NSW'),
('Southern Star Shooters', 'NSW'),
('Great Southern Archery Association', 'NSW'),
('Kimberley Archery Society', 'TAS'),
('Great Southern Archery Association', 'NSW'),
('Great Southern Snipers', 'NSW'),
('Coral Cove Archers', 'NSW'),
('Bondi Archers Inc.', 'TAS'),
('Moorabbin Archery Club', 'NSW'),
('Boomerang Bullseyes', 'WA'),
('Sydney Harbour Archers', 'NSW'),
('Murray-Darling Marksmen', 'SA'),
('Bowerbird Bowmen', 'NSW'),
('Bunyip Bush Bowmen', 'NSW'),
('Whitsunday Whizzers', 'SA'),
('Coral Sea Shooters', 'NSW'),
('Snowy Mountains Archery Club', 'NSW'),
('Aussie Arrow Artists', 'NSW'),
('Reefside Robin Hoods', 'NSW'),
('Bondi Archers Inc.', 'NSW'),
('Saltwater Shooters', 'TAS'),
('Bowerbird Bowmen', 'NSW'),
('Aussie Archer Alliance', 'NSW'),
('Alice Springs Archery Association', 'SA'),
('Bondi Archers Inc.', 'SA'),
('Aussie Adventure Archery Association', 'VIC'),
('Victorian Vantage', 'SA'),
('Bondi Archers Inc.', 'NSW'),
('Victorian Advantage', 'NSW'),
('Outback Oasis Archers', 'NSW'),
('Coral Cove Archers', 'NSW'),
('Hunter Valley Archers', 'NSW'),
('Sydney Sights Archery Society', 'NSW'),
('Coral Coast Archers', 'SA'),
('Aussie Arrowheads Club', 'SA'),
('Aussie Bow Benders', 'NSW'),
('Southern Cross Bowmen', 'WA'),
('Victoria Plains Archery Club', 'NSW'),
('Bowerbird Bowmen', 'WA'),
('Eucalyptus Arrows Association', 'SA'),
('Sydney Sights Archery Society', 'NSW'),
('Gold Coast Bowmen', 'QLD'),
('Red Centre Archery Club', 'NSW'),
('Coastal Koala Archers', 'NSW'),
('Bondi Archers Inc.', 'NSW'),
('Blue Gum Bowmen', 'NSW'),
('Tasmanian Target Tribe', 'TAS'),
('Kimberley Archery Society', 'SA'),
('Bushland Bullseye Club', 'QLD'),
('Bluewater Bowmen', 'SA'),
('Murray Mallee Marksmen', 'NSW'),
('Aussie Arrow Alliance', 'NSW'),
('Box Hill City Club', 'NSW'),
('Moorabbin Archery Club', 'SA'),
('Kangaroo Island Archers', 'NSW'),
('Blue Gum Bowmen', 'NSW'),
('Surfside Shooters', 'NSW'),
('Abbey Archery', 'SA'),
('Sydney Harbour Archers', 'VIC'),
('Reefside Robin Hoods', 'VIC'),
('Bluewater Bowmen', 'SA'),
('Murray-Darling Marksmen', 'NSW'),
('Aussie Arid Archers', 'NSW'),
('Bowerbird Bowmen', 'TAS'),
('Dingo Downs Archery Alliance', 'NSW'),
('Archery Club', 'NSW'),
('Bunya Bullseyes', 'NSW'),
('Aussie Outdoors Archery Club', 'WA'),
('Saltwater Shooters', 'NSW'),
('Aussie Arrow Alliance', 'WA'),
('Rogue Archery', 'NSW'),
('Aussie Adventure Archery Association', 'NSW'),
('Yarra Bowmen Inc.', 'NSW'),
('Aussie Bow Benders', 'NSW'),
('Reefside Robin Hoods', 'NSW'),
('Victorian Vantage', 'NSW'),
('Aussie Outback Archers', 'SA'),
('Sydney Harbour Archers', 'NSW'),
('Queensland Quiver Club', 'NSW'),
('Koala Archer Alliance', 'NSW'),
('Box Hill City Club', 'NSW'),
('Box Hill City Club', 'NSW'),
('Aussie Bush Bullseyes', 'NSW'),
('Golden Wattle Archers', 'VIC'),
('Hunter Valley Archers', 'SA'),
('Tropical Territory Archery Club', 'VIC'),
('Great Barrier Archers', 'NSW'),
('Murray River Marksmen', 'SA'),
('Sydney Sights Archery Society', 'NSW'),
('Boomerang Bullseyes', 'NSW'),
('Aussie Arid Archers', 'NSW'),
('Gold Rush Archery Club', 'VIC'),
('Aussie Alps Archery Association', 'NSW'),
('Coral Coast Crossbows', 'WA'),
('Barramundi Bowmen', 'NSW'),
('Box Hill City Club', 'NSW'),
('Waverley City Archers Inc.', 'NSW'),
('Murray-Darling Marksmen', 'NSW'),
('Aussie Outdoors Archery Club', 'NSW'),
('Kimberley Archery Society', 'WA'),
('Red Centre Archery Club', 'NSW'),
('Bunya Bullseyes', 'NSW'),
('Aussie Oak Archers', 'SA'),
('Coastal Crest Archery Society', 'NSW'),
('Alice Springs Archery Association', 'NSW'),
('Murray-Darling Marksmen', 'NSW'),
('Outback Oasis Archers', 'NSW'),
('Bunya Bullseyes', 'SA'),
('Outback Oasis Archery Club', 'NSW'),
('Yabby Yards Archery Association', 'NSW'),
('Gumtree Grove Archery Club', 'NSW'),
('Bushland Bullseye Club', 'TAS'),
('Archery Club', 'NSW'),
('Coral Coast Archers', 'NSW'),
('Eucalyptus Arrows Association', 'NSW'),
('Tasmanian Wombat Archers', 'TAS'),
('Coastal Crest Archery Society', 'QLD'),
('Great Dividing Range Archery Club', 'NSW'),
('Outback Ochre Archers', 'NSW'),
('Kangaroo Island Archers', 'NSW'),
('Coral Coast Archers', 'NSW'),
('Sunburnt Sky Archers', 'SA'),
('Emu Plains Archery Club', 'NSW'),
('Red Centre Archery Club', 'QLD'),
('Coast Archers', 'SA'),
('Bunya Bullseyes', 'NSW'),
('Aussie Arrowheads Club', 'NSW'),
('Great Dividing Range Archery Club', 'NSW'),
('Murray Mallee Marksmen', 'NSW'),
('Yarra Bowmen Inc.', 'SA'),
('Desert Dingo Archery Club', 'WA'),
('Golden Outback Archers', 'NSW'),
('Victoria Archery Club', 'VIC'),
('Aussie Outback Archers', 'NSW'),
('Rainbow Archery Alliance', 'TAS'),
('Ironbark Archery Club', 'NSW'),
('Red Centre Archery Club', 'TAS'),
('Kimberley Archery Society', 'SA'),
('Coral Coast Crossbows', 'NSW'),
('Yarra Valley Archery Park', 'NSW'),
('Kangaroo Point Archery Club', 'TAS'),
('Barramundi Bowmen', 'NSW'),
('Yabby Yards Archery Association', 'WA'),
('Koala Archer Alliance', 'NSW'),
('Emu Plains Archery Club', 'NSW'),
('Coastal Crest Archery Society', 'SA'),
('Surfside Shooters', 'NSW'),
('Bluewater Bowmen', 'SA'),
('Sydney Sights Archery Society', 'NSW'),
('Emu Plains Archery Club', 'NSW'),
('Golden Wattle Archers', 'NSW'),
('Bunya Bullseyes', 'SA'),
('Gumtree Grove Archery Club', 'TAS'),
('Outback Oasis Archers', 'SA'),
('Aussie Outback Archers', 'WA'),
('Great Barrier Archers', 'NSW'),
('Ironbark Archers', 'SA'),
('Aussie Archer Alliance', 'NSW'),
('Archery Club', 'NSW'),
('Yabby Yards Archery Association', 'SA'),
('Aussie Arrow Alliance', 'SA'),
('Coral Coast Archers', 'SA'),
('Apex Hunting', 'NSW'),
('Reefside Rangers', 'NSW'),
('Aussie Alps Archery Association', 'NSW'),
('Outback Oasis Archery Club', 'SA'),
('Golden Outback Archers', 'NSW'),
('Apex Hunting', 'NSW'),
('Rainbow Archery Alliance', 'NSW'),
('Platypus Precision', 'TAS'),
('Yabby Yards Archery Association', 'NSW'),
('Bondi Archers Inc.', 'NSW'),
('Aussie Alps Archery Association', 'NSW'),
('Yarra Bowmen Inc.', 'QLD'),
('Archery Club', 'QLD'),
('Boomerang Bullseyes', 'TAS'),
('Emu Plains Archery Club', 'SA'),
('Yarra Bowmen Inc.', 'NSW'),
('Dingo Downs Archery Alliance', 'NSW'),
('Aussie Bow Benders', 'NSW'),
('Sydney Sights Archery Society', 'NSW'),
('Kimberley Archery Society', 'VIC'),
('Aussie Arrowheads Club', 'NSW'),
('Vic Archery Club', 'NSW'),
('Moorabbin Archery Club', 'NSW'),
('Aussie Adventure Archery Association', 'NSW'),
('Bondi Archers Inc.', 'NSW'),
('Kangaroo Point Archery Club', 'NSW'),
('Platypus Precision', 'NSW'),
('Great Barrier Archers', 'VIC'),
('Aussie Oak Archers', 'VIC'),
('Saltwater Shooters', 'NSW'),
('Northern Territory Bullseyes', 'NSW'),
('Great Dividing Range Archery Club', 'TAS'),
('Outback Oasis Archers', 'NSW'),
('Bushland Bullseye Club', 'NSW'),
('Golden Outback Archers', 'NSW'),
('Coral Cove Archers', 'WA'),
('Wattle Wanderers Archery Club', 'NSW'),
('Outback Bullseyes', 'NSW'),
('Surfside Shooters', 'NSW'),
('Cockatoo Creek Archers', 'NSW'),
('Bushland Bullseye Club', 'NSW'),
('Coastal Koala Archers', 'NSW'),
('Waverley City Archers Inc.', 'NSW'),
('Outback Oasis Archers', 'NSW'),
('Bluewater Bowmen', 'NSW'),
('Yarra Valley Archery Park', 'NSW'),
('Tasmanian Target Tribe', 'TAS'),
('Dudley Preston Archery', 'NSW'),
('Great Southern Snipers', 'WA'),
('Murray-Darling Marksmen', 'NSW'),
('Great Southern Snipers', 'SA'),
('Red Centre Archery Club', 'TAS'),
('Outback Oasis Archers', 'NSW'),
('Surfside Shooters', 'NSW'),
('Top End Targets', 'WA'),
('Apex Hunting', 'NSW'),
('Surfside Shooters', 'QLD'),
('Emu Plains Archery Club', 'VIC'),
('Yarra Valley Archery Park', 'TAS'),
('Yarra Valley Archery Park', 'NSW'),
('Northern Territory Bullseyes', 'WA'),
('Aussie Outdoors Archery Club', 'WA'),
('Aussie Arrow Alliance', 'NSW'),
('Murray Mallee Marksmen', 'SA'),
('Aussie Oak Archers', 'NSW'),
('Queensland Quiver Club', 'NSW'),
('Gold Coast Bowmen', 'NSW'),
('Alice Springs Archery Association', 'NSW'),
('Yarra Bowmen Inc.', 'SA'),
('Aussie Arrow Alliance', 'TAS'),
('Aussie Archer Alliance', 'TAS'),
('Aussie Arid Archers', 'TAS'),
('Emu Plains Archery Club', 'NSW'),
('Brisbane Bush Bowmen', 'NSW'),
('Victorian Vantage', 'NSW'),
('Kimberley Archery Society', 'SA'),
('Aussie Adventure Archery Association', 'NSW'),
('Murray Mallee Marksmen', 'NSW'),
('Yarra Valley Archery Park', 'WA'),
('Bondi Archers Inc.', 'VIC'),
('Bluewater Bowmen', 'SA'),
('Koala Archer Alliance', 'NSW'),
('Sydney Surrounds Archery Society', 'NSW'),
('Archery Club', 'WA'),
('Gold Rush Archery Club', 'QLD'),
('Box Hill City Club', 'VIC'),
('Great Southern Snipers', 'NSW'),
('Box Hill City Club', 'NSW'),
('Bowerbird Bowmen', 'NSW'),
('Coast Archers', 'SA'),
('Yarra Bowmen Inc.', 'NSW'),
('Aussie Arrow Alliance', 'QLD'),
('Gold Coast Bowmen', 'WA'),
('Gumtree Grove Archery Club', 'WA'),
('Victorian Vantage', 'NSW'),
('Rogue Archery', 'SA'),
('Golden Wattle Archers', 'NSW'),
('Alice Springs Archery Association', 'NSW'),
('Red Centre Archery Club', 'NSW'),
('Yarra Bowmen Inc.', 'NSW'),
('Rainbow Archery Alliance', 'TAS'),
('Centenary Archers', 'SA'),
('Top End Target Team', 'NSW'),
('Rainbow Archery Alliance', 'NSW'),
('Tropical Territory Archery Club', 'WA'),
('Brisbane Bush Bowmen', 'NSW'),
('Victorian Vantage', 'NSW'),
('Southern Cross Bowmen', 'NSW'),
('Aussie Archer Alliance', 'TAS'),
('Barossa Valley Bowmen', 'NSW'),
('Victorian Vantage', 'NSW'),
('Platypus Precision', 'NSW'),
('Surfside Shooters', 'NSW'),
('Victoria Archery Club', 'NSW'),
('Apex Hunting', 'NSW'),
('Alice Springs Archery Association', 'NSW'),
('Koala Archer Alliance', 'NSW'),
('Queensland Quiver Club', 'NSW'),
('Murray River Marksmen', 'NSW'),
('Victorian Vantage', 'SA'),
('Ironbark Archery Club', 'NSW'),
('Aussie Outdoors Archery Club', 'NSW'),
('Coral Coast Archers', 'NSW'),
('Emu Plains Archery Club', 'NSW'),
('Barramundi Bowmen', 'NSW'),
('Aussie Bushland Bowmen', 'TAS'),
('Bondi Archers Inc.', 'QLD'),
('Yabby Yards Archery Association', 'NSW'),
('Barossa Bowmen', 'NSW'),
('Waverley City Archers Inc.', 'NSW'),
('Victoria Archery Club', 'NSW'),
('Sydney Surrounds Archery Society', 'NSW'),
('Victoria Plains Archery Club', 'NSW'),
('Archery Club', 'NSW'),
('Aussie Bush Bullseyes', 'NSW'),
('Great Southern Snipers', 'TAS'),
('Aussie Arrow Alliance', 'NSW'),
('Great Dividing Range Archery Club', 'TAS'),
('Great Southern Snipers', 'NSW'),
('Bunyip Bush Bowmen', 'NSW'),
('Tasmanian Target Tribe', 'TAS'),
('Yarra Bowmen Inc.', 'NSW'),
('Great Southern Archery Association', 'NSW'),
('Sunburnt Sky Archers', 'TAS'),
('Platypus Precision', 'TAS'),
('Box Hill City Club', 'NSW'),
('Great Southern Snipers', 'ACT'),
('Gold Coast Bowmen', 'NSW'),
('Yarra Bowmen Inc.', 'QLD'),
('Victorian Vantage', 'NSW'),
('Gold Rush Archery Club', 'NSW'),
('Aussie Alps Archery Association', 'NSW'),
('Sydney Surrounds Archery Society', 'VIC'),
('Bunyip Bush Bowmen', 'NSW'),
('Koala Archer Alliance', 'WA'),
('Victorian Vantage', 'WA'),
('Snowy Mountains Archery Club', 'VIC'),
('Aussie Arid Archers', 'WA'),
('Reefside Rangers', 'WA'),
('Gumtree Grove Archery Club', 'NSW'),
('Great Dividing Range Archery Club', 'WA'),
('Victoria Archery Club', 'NSW'),
('Desert Dingo Archery Club', 'NSW'),
('Southern Cross Bowmen', 'TAS'),
('Barossa Valley Bowmen', 'NSW'),
('Archery Club', 'NSW'),
('Outback Ochre Archers', 'NSW'),
('Wombat Wilderness Archers', 'NSW'),
('Murray Mallee Marksmen', 'TAS'),
('Victoria Archery Club', 'VIC'),
('Saltwater Shooters', 'SA'),
('Red Centre Archery Club', 'SA'),
('Victoria Plains Archery Club', 'SA'),
('Outback Oasis Archers', 'NSW'),
('Apex Hunting', 'NSW'),
('Southern Cross Bowmen', 'NSW'),
('Aussie Alps Archery Association', 'NSW'),
('Bushland Bullseye Club', 'TAS'),
('Aussie Arrow Artists', 'NSW'),
('Queensland Quiver Club', 'WA'),
('Archery Club', 'NSW'),
('Sydney Harbour Archers', 'TAS'),
('Waverley City Archers Inc.', 'SA'),
('Coral Sea Shooters', 'NSW'),
('Murray Mallee Marksmen', 'WA'),
('Murray River Marksmen', 'SA'),
('Sydney Sights Archery Society', 'QLD'),
('Coral Coast Archers', 'NSW'),
('Great Dividing Range Archery Club', 'NSW'),
('Hunter Valley Archers', 'NSW'),
('Platypus Precision', 'NSW'),
('Coral Coast Archers', 'NSW'),
('Murray-Darling Marksmen', 'NSW'),
('Northern Territory Bullseyes', 'TAS'),
('Bondi Archers Inc.', 'NSW'),
('Yarra Bowmen Inc.', 'NSW'),
('Barossa Valley Bowmen', 'NSW'),
('Aussie Bow Benders', 'SA'),
('Ironbark Archery Club', 'TAS'),
('Great Dividing Range Archery Club', 'NSW'),
('Moorabbin Archery Club', 'ACT'),
('Abbey Archery', 'SA'),
('Top End Targets', 'NSW'),
('Coastal Crest Archery Society', 'NSW'),
('Snowy Mountains Archery Club', 'TAS'),
('Koala Archer Alliance', 'NSW'),
('Yarra Bowmen Inc.', 'NSW'),
('Murray River Marksmen', 'NSW'),
('Southern Star Shooters', 'NSW'),
('Centenary Archers', 'TAS'),
('Box Hill City Club', 'NSW'),
('Yabby Yards Archery Association', 'NSW'),
('Gold Coast Bowmen', 'NSW'),
('Southern Cross Bowmen', 'VIC'),
('Yarra Valley Archery Park', 'NSW'),
('Bunya Bullseyes', 'NSW'),
('Gold Rush Archery Club', 'NSW'),
('Hunter Valley Archers', 'SA'),
('Whitsunday Whizzers', 'QLD'),
('Brisbane Bush Bowmen', 'NSW'),
('Red Desert Bowmen', 'TAS'),
('Outback Bullseyes', 'SA'),
('Murray-Darling Marksmen', 'NSW'),
('Southern Star Shooters', 'TAS'),
('Victoria Plains Archery Club', 'SA'),
('Blue Mountains Archery Society', 'TAS'),
('Golden Outback Archers', 'NSW'),
('Bondi Archers Inc.', 'NSW'),
('Bluewater Bowmen', 'NSW'),
('Waverley City Archers Inc.', 'NSW'),
('Boomerang Bullseyes', 'NSW'),
('Coral Sea Shooters', 'NSW'),
('Coral Coast Archers', 'QLD'),
('Desert Dingo Archery Club', 'NSW'),
('Abbey Archery', 'NSW'),
('Red Centre Archery Club', 'NSW'),
('Alice Springs Archery Association', 'NSW'),
('Bunyip Bush Bowmen', 'NSW'),
('Coral Coast Archers', 'NSW'),
('Reefside Robin Hoods', 'NSW'),
('Sunburnt Sky Archers', 'NSW'),
('Coastal Crest Archery Society', 'NSW'),
('Barossa Bowmen', 'NSW'),
('Centenary Archers', 'NSW'),
('Hunter Valley Archers', 'NSW'),
('Great Dividing Range Archery Club', 'NSW'),
('Eucalyptus Arrows Association', 'TAS'),
('Aussie Archer Alliance', 'NSW'),
('Waverley City Archers Inc.', 'VIC'),
('Outback Ochre Archers', 'TAS'),
('Outback Ochre Archers', 'NSW'),
('Coral Cove Archers', 'TAS'),
('Barossa Valley Bowmen', 'TAS'),
('Yarra Valley Archery Park', 'NSW'),
('Aussie Arrowheads Club', 'SA'),
('Gumtree Grove Archery Club', 'NSW'),
('Blue Gum Bowmen', 'NSW'),
('Outback Oasis Archery Club', 'SA'),
('Tasmanian Tiger Archers', 'SA'),
('Box Hill City Club', 'SA'),
('Coral Sea Shooters', 'NSW'),
('Tasmanian Tiger Archers', 'NSW'),
('Bondi Archers Inc.', 'NSW'),
('Yarra Valley Archery Park', 'NSW'),
('Victorian Vantage', 'NSW'),
('Moorabbin Archery Club', 'NSW'),
('Victoria Archery Club', 'NSW'),
('Gold Coast Bowmen', 'QLD'),
('Centenary Archers', 'SA'),
('Wombat Wilderness Archers', 'NSW'),
('Wombat Wilderness Archers', 'NSW'),
('Centenary Archers', 'NSW'),
('Yarra Valley Archery Park', 'NSW'),
('Great Barrier Archers', 'TAS'),
('Bushland Bullseye Club', 'NSW'),
('Barossa Valley Bowmen', 'TAS'),
('Gold Coast Bowmen', 'NSW'),
('Alice Springs Archery Association', 'NSW'),
('Outback Bullseyes', 'TAS'),
('Wattle Wanderers Archery Club', 'SA'),
('Gold Rush Archery Club', 'SA'),
('Great Southern Archery Association', 'NSW'),
('Barossa Bowmen', 'SA'),
('Sydney Surrounds Archery Society', 'NSW'),
('Platypus Precision', 'TAS'),
('Yarra Bowmen Inc.', 'NSW'),
('Reefside Rangers', 'SA'),
('Aussie Arrowheads Club', 'TAS'),
('Outback Bullseyes', 'NSW'),
('Coral Sea Shooters', 'SA'),
('Aussie Outdoors Archery Club', 'NSW'),
('Waverley City Archers Inc.', 'NSW'),
('Bondi Archers Inc.', 'SA'),
('Emu Plains Archery Club', 'TAS'),
('Waverley City Archers Inc.', 'NSW'),
('Yarra Valley Archery Park', 'SA'),
('Red Desert Bowmen', 'NSW'),
('Coastal Crest Archery Society', 'SA'),
('Top End Targets', 'NSW'),
('Coral Sea Shooters', 'NSW'),
('Top End Targets', 'NSW'),
('Aussie Adventure Archery Association', 'NSW'),
('Southern Cross Bowmen', 'NSW'),
('Aussie Bush Bullseyes', 'NSW'),
('Box Hill City Club', 'NSW'),
('Golden Outback Archers', 'NSW'),
('Queensland Quiver Club', 'SA'),
('Coral Coast Archers', 'NSW'),
('Murray River Marksmen', 'VIC'),
('Hunter Valley Archers', 'NSW'),
('Snowy Mountains Archery Club', 'QLD'),
('Boomerang Bullseyes', 'NSW'),
('Rainbow Archery Alliance', 'SA'),
('Reefside Rangers', 'NSW'),
('Bunya Bullseyes', 'NSW'),
('Bunya Bullseyes', 'NSW'),
('Golden Outback Archers', 'NSW'),
('Barramundi Bowmen', 'ACT'),
('Reefside Robin Hoods', 'NSW'),
('Yarra Valley Archery Park', 'ACT'),
('Cockatoo Creek Archers', 'ACT'),
('Eucalyptus Arrows Association', 'NSW'),
('Outback Oasis Archers', 'NSW'),
('Aussie Adventure Archery Association', 'NSW'),
('Box Hill City Club', 'NSW'),
('Sydney Surrounds Archery Society', 'NSW'),
('Victoria Plains Archery Club', 'SA'),
('Victoria Archery Club', 'SA'),
('Reefside Rangers', 'TAS'),
('Desert Dingo Archery Club', 'NSW'),
('Coral Coast Crossbows', 'NSW'),
('Aussie Arrowheads Club', 'NSW'),
('Archery Club', 'TAS'),
('Coast Archers', 'NSW'),
('Cockatoo Creek Archers', 'NSW'),
('Sydney Sights Archery Society', 'NSW'),
('Brisbane Bush Bowmen', 'SA'),
('Aussie Archer Alliance', 'NSW'),
('Kimberley Archery Society', 'TAS'),
('Moorabbin Archery Club', 'SA'),
('Coral Coast Archers', 'NSW'),
('Brisbane Bush Bowmen', 'QLD'),
('Aussie Bush Bullseyes', 'QLD'),
('Snowy Mountains Archery Club', 'VIC'),
('Snowy Mountains Archery Club', 'NSW'),
('Aussie Adventure Archery Association', 'NSW'),
('Gold Coast Bowmen', 'SA'),
('Archery Club', 'NSW'),
('Aussie Adventure Archery Association', 'QLD'),
('Saltwater Shooters', 'NSW'),
('Sydney Surrounds Archery Society', 'VIC'),
('Box Hill City Club', 'WA'),
('Alice Springs Archery Association', 'NSW'),
('Sydney Sights Archery Society', 'NSW'),
('Rainbow Archery Alliance', 'NSW'),
('Yabby Yards Archery Association', 'TAS'),
('Moorabbin Archery Club', 'NSW'),
('Aussie Arid Archers', 'TAS'),
('Kangaroo Island Archers', 'TAS'),
('Victoria Archery Club', 'TAS'),
('Aussie Outback Archers', 'NSW'),
('Coral Coast Crossbows', 'WA'),
('Aussie Outback Archers', 'NSW'),
('Aussie Arrow Artists', 'VIC'),
('Sydney Harbour Archers', 'NSW'),
('Northern Territory Bullseyes', 'VIC'),
('Koala Archer Alliance', 'ACT'),
('Kimberley Archery Society', 'NSW'),
('Outback Ochre Archers', 'NSW'),
('Barossa Bowmen', 'VIC'),
('Coral Coast Archers', 'WA'),
('Cockatoo Creek Archers', 'NSW'),
('Abbey Archery', 'NSW'),
('Aussie Arrow Alliance', 'TAS'),
('Tropical Territory Archery Club', 'NSW'),
('Sydney Surrounds Archery Society', 'NSW'),
('Emu Plains Archery Club', 'NSW'),
('Box Hill City Club', 'NSW'),
('Gumtree Grove Archery Club', 'NSW'),
('Blue Mountains Archery Society', 'NSW'),
('Koala Archer Alliance', 'TAS'),
('Snowy Mountains Archery Club', 'SA'),
('Aussie Arrow Alliance', 'NSW'),
('Blue Gum Bowmen', 'SA'),
('Aussie Adventure Archery Association', 'NSW'),
('Gold Coast Bowmen', 'TAS'),
('Red Centre Archery Club', 'TAS'),
('Queensland Quiver Club', 'NSW'),
('Snowy Mountains Archery Club', 'TAS'),
('Blue Gum Bowmen', 'NSW'),
('Wombat Wilderness Archers', 'TAS'),
('Golden Outback Archers', 'NSW'),
('Tasmanian Target Tribe', 'NSW'),
('Yarra Valley Archery Park', 'NSW'),
('Brisbane Bush Bowmen', 'NSW'),
('Kimberley Archery Society', 'NSW'),
('Waverley City Archers Inc.', 'NSW'),
('Red Centre Archery Club', 'SA'),
('Boomerang Bullseyes', 'NSW'),
('Coastal Koala Archers', 'NSW'),
('Kangaroo Island Archers', 'VIC'),
('Coast Archers', 'WA'),
('Cockatoo Creek Archers', 'TAS'),
('Bowerbird Bowmen', 'NSW'),
('Sydney Sights Archery Society', 'NSW'),
('Boomerang Bullseyes', 'NSW'),
('Victoria Archery Club', 'NSW'),
('Cockatoo Creek Archers', 'TAS'),
('Yarra Valley Archery Park', 'TAS'),
('Platypus Precision', 'NSW'),
('Queensland Quiver Club', 'NSW'),
('Victoria Archery Club', 'NSW'),
('Dingo Downs Archery Alliance', 'NSW'),
('Southern Star Shooters', 'NSW'),
('Coastal Koala Archers', 'NSW'),
('Bondi Archers Inc.', 'SA'),
('Blue Mountains Archery Society', 'NSW'),
('Rogue Archery', 'NSW'),
('Emu Plains Archery Club', 'NSW'),
('Aussie Oak Archers', 'NSW'),
('Outback Ochre Archers', 'NSW'),
('Aussie Archer Alliance', 'SA'),
('Sunburnt Sky Archers', 'VIC'),
('Yabby Yards Archery Association', 'NSW'),
('Murray-Darling Marksmen', 'NSW'),
('Northern Territory Bullseyes', 'NSW'),
('Bushland Bullseye Club', 'NSW'),
('Aussie Arrow Artists', 'NSW'),
('Platypus Precision', 'NSW'),
('Boomerang Bullseyes', 'VIC'),
('Northern Territory Bullseyes', 'SA'),
('Alice Springs Archery Association', 'WA'),
('Apex Hunting', 'WA'),
('Aussie Arrow Alliance', 'SA'),
('Reefside Rangers', 'SA'),
('Surfside Shooters', 'QLD'),
('Gold Rush Archery Club', 'WA'),
('Outback Oasis Archery Club', 'NSW'),
('Coral Coast Archers', 'TAS'),
('Kangaroo Point Archery Club', 'NSW'),
('Desert Dingo Archery Club', 'NSW'),
('Northern Territory Bullseyes', 'NSW'),
('Coast Archers', 'NSW'),
('Red Centre Archery Club', 'NSW'),
('Bondi Archers Inc.', 'NSW'),
('Snowy Mountains Archery Club', 'SA'),
('Victoria Plains Archery Club', 'TAS'),
('Great Southern Snipers', 'NSW'),
('Sydney Harbour Archers', 'QLD'),
('Outback Oasis Archery Club', 'QLD'),
('Kangaroo Point Archery Club', 'NSW'),
('Great Dividing Range Archery Club', 'SA'),
('Aussie Bow Benders', 'SA'),
('Kimberley Archery Society', 'SA'),
('Coral Sea Shooters', 'NSW'),
('Kangaroo Point Archery Club', 'VIC'),
('Whitsunday Whizzers', 'NSW'),
('Cockatoo Creek Archers', 'WA'),
('Aussie Alps Archery Association', 'SA'),
('Gold Coast Bowmen', 'TAS'),
('Hunter Valley Archers', 'NSW'),
('Blue Gum Bowmen', 'NSW'),
('Aussie Oak Archers', 'NSW'),
('Aussie Outdoors Archery Club', 'SA'),
('Yarra Bowmen Inc.', 'NSW'),
('Outback Oasis Archers', 'TAS'),
('Hunter Valley Archers', 'NSW'),
('Wattle Wanderers Archery Club', 'NSW'),
('Great Southern Snipers', 'NSW'),
('Alice Springs Archery Association', 'NSW'),
('Coral Coast Archers', 'NSW'),
('Yarra Bowmen Inc.', 'VIC'),
('Kangaroo Island Archers', 'NSW'),
('Bunyip Bush Bowmen', 'NSW'),
('Centenary Archers', 'NSW'),
('Outback Oasis Archers', 'NSW'),
('Tasmanian Target Tribe', 'NSW'),
('Aussie Bow Benders', 'NSW'),
('Victoria Archery Club', 'NSW'),
('Northern Territory Bullseyes', 'NSW'),
('Sydney Surrounds Archery Society', 'NSW'),
('Blue Mountains Archery Society', 'VIC'),
('Victorian Vantage', 'NSW'),
('Outback Oasis Archers', 'SA'),
('Emu Plains Archery Club', 'NSW'),
('Abbey Archery', 'NSW'),
('Victoria Archery Club', 'NSW'),
('Coastal Crest Archery Society', 'WA'),
('Barramundi Bowmen', 'NSW'),
('Yarra Bowmen Inc.', 'VIC'),
('Eucalyptus Arrows Association', 'QLD'),
('Eucalyptus Arrows Association', 'VIC'),
('Coast Archers', 'NSW'),
('Sydney Harbour Archers', 'SA'),
('Yarra Valley Archery Park', 'QLD'),
('Red Desert Bowmen', 'NSW'),
('Koala Archer Alliance', 'NSW'),
('Abbey Archery', 'VIC'),
('Ironbark Archers', 'NSW'),
('Gold Coast Bowmen', 'SA'),
('Reefside Robin Hoods', 'WA'),
('Victoria Archery Club', 'NSW'),
('Wattle Wanderers Archery Club', 'TAS'),
('Aussie Arid Archers', 'NSW'),
('Outback Ochre Archers', 'SA'),
('Aussie Adventure Archery Association', 'NSW'),
('Victoria Archery Club', 'NSW'),
('Tasmanian Target Tribe', 'NSW'),
('Cockatoo Creek Archers', 'NSW'),
('Aussie Alps Archery Association', 'SA'),
('Red Desert Bowmen', 'SA'),
('Coastal Crest Archery Society', 'SA'),
('Outback Bullseyes', 'NSW'),
('Southern Cross Bowmen', 'NSW'),
('Southern Star Shooters', 'TAS'),
('Koala Archer Alliance', 'QLD'),
('Coastal Koala Archers', 'NSW'),
('Aussie Bow Benders', 'NSW'),
('Box Hill City Club', 'NSW'),
('Kangaroo Point Archery Club', 'TAS'),
('Koala Archer Alliance', 'QLD'),
('Emu Plains Archery Club', 'NSW'),
('Koala Archer Alliance', 'NSW'),
('Yarra Bowmen Inc.', 'NSW'),
('Aussie Alps Archery Association', 'NSW'),
('Victoria Plains Archery Club', 'NSW'),
('Great Southern Snipers', 'SA'),
('Outback Oasis Archery Club', 'NSW'),
('Yabby Yards Archery Association', 'NSW'),
('Yarra Bowmen Inc.', 'NSW'),
('Victoria Archery Club', 'TAS'),
('Coral Sea Shooters', 'NSW'),
('Aussie Outback Archers', 'TAS'),
('Tasmanian Tiger Archers', 'SA'),
('Bondi Archers Inc.', 'NSW'),
('Desert Dingo Archery Club', 'SA'),
('Murray Mallee Marksmen', 'NSW'),
('Rainbow Archery Alliance', 'NSW'),
('Bluewater Bowmen', 'SA'),
('Aussie Archer Alliance', 'NSW'),
('Bushland Bullseye Club', 'WA'),
('Ironbark Archers', 'SA'),
('Waverley City Archers Inc.', 'SA'),
('Outback Ochre Archers', 'NSW'),
('Aussie Bow Benders', 'NSW'),
('Hunter Valley Archers', 'NSW'),
('Ironbark Archery Club', 'ACT'),
('Hunter Valley Archers', 'QLD'),
('Apex Hunting', 'NSW'),
('Red Centre Archery Club', 'NSW'),
('Bunyip Bush Bowmen', 'NSW'),
('Whitsunday Whizzers', 'SA'),
('Yabby Yards Archery Association', 'NSW'),
('Coral Coast Crossbows', 'NSW'),
('Golden Outback Archers', 'NSW'),
('Top End Target Team', 'SA'),
('Waverley City Archers Inc.', 'NSW'),
('Yarra Bowmen Inc.', 'NSW'),
('Aussie Arrow Alliance', 'NSW'),
('Abbey Archery', 'NSW'),
('Coastal Crest Archery Society', 'NSW'),
('Box Hill City Club', 'NSW'),
('Murray Mallee Marksmen', 'NSW'),
('Top End Target Team', 'SA'),
('Tasmanian Tiger Archers', 'VIC'),
('Canberra Archery Club', 'ACT'),
('Aussie Arrow Alliance', 'NSW'),
('Surfside Shooters', 'NSW'),
('Coral Sea Shooters', 'TAS'),
('Rogue Archery', 'QLD'),
('Coral Coast Archers', 'NSW'),
('Boomerang Bullseyes', 'TAS'),
('Reefside Robin Hoods', 'SA'),
('Bunyip Bush Bowmen', 'SA'),
('Eucalyptus Arrows Association', 'ACT'),
('Surfside Shooters', 'NSW'),
('Aussie Alps Archery Association', 'NSW'),
('Hunter Valley Archers', 'NSW'),
('Bunya Bullseyes', 'NSW'),
('Aussie Outback Archers', 'ACT'),
('Red Centre Archery Club', 'NSW'),
('Golden Wattle Archers', 'NSW'),
('Yarra Valley Archery Park', 'SA'),
('Bunyip Bush Bowmen', 'NSW'),
('Boomerang Bullseyes', 'WA'),
('Great Barrier Archers', 'SA'),
('Red Centre Archery Club', 'TAS'),
('Top End Targets', 'NSW'),
('Archery Club', 'SA'),
('Golden Wattle Archers', 'NSW'),
('Moorabbin Archery Club', 'NSW'),
('Blue Gum Bowmen', 'NSW'),
('Aussie Outback Archers', 'NSW'),
('Abbey Archery', 'NSW'),
('Archery Club', 'NSW'),
('Moorabbin Archery Club', 'TAS'),
('Great Barrier Archers', 'VIC'),
('Koala Archer Alliance', 'SA'),
('Reefside Robin Hoods', 'NSW'),
('Tasmanian Target Tribe', 'SA'),
('Sydney Harbour Archers', 'NSW'),
('Coast Archers', 'NSW'),
('Platypus Precision', 'VIC'),
('Coastal Crest Archery Society', 'SA'),
('Queensland Quiver Club', 'NSW'),
('Ironbark Archery Club', 'NSW'),
('Kew City Bowmen', 'ACT'),
('Southern Star Shooters', 'TAS'),
('Tasmanian Target Tribe', 'NSW'),
('Bondi Archers Inc.', 'NSW'),
('Rainbow Archery Alliance', 'SA'),
('Barossa Bowmen', 'NSW'),
('Bushland Bullseye Club', 'NSW'),
('Dingo Downs Archery Alliance', 'NSW'),
('Alice Springs Archery Association', 'SA'),
('Reefside Rangers', 'SA'),
('Snowy Mountains Archery Club', 'SA'),
('Southern Star Shooters', 'VIC'),
('Archery Club', 'SA'),
('Alice Springs Archery Association', 'NSW'),
('Rogue Archery', 'NSW'),
('Aussie Adventure Archery Association', 'NSW'),
('Bowerbird Bowmen', 'NSW'),
('Hunter Valley Archers', 'SA'),
('Yarra Valley Archery Park', 'TAS'),
('Red Desert Bowmen', 'NSW'),
('Outback Oasis Archery Club', 'NSW'),
('Kangaroo Point Archery Club', 'SA'),
('Dingo Downs Archery Alliance', 'NSW'),
('Saltwater Shooters', 'TAS'),
('Top End Targets', 'NSW'),
('Ironbark Archery Club', 'SA'),
('Yarra Valley Archery Park', 'TAS'),
('Emu Plains Archery Club', 'NSW'),
('Top End Target Team', 'NSW'),
('Sydney Harbour Archers', 'NSW'),
('Brisbane Bush Bowmen', 'TAS'),
('Barramundi Bowmen', 'VIC'),
('Bluewater Bowmen', 'TAS'),
('Yarra Bowmen Inc.', 'NSW'),
('Platypus Precision', 'NSW'),
('Moorabbin Archery Club', 'NSW'),
('Victoria Archery Club', 'VIC'),
('Waverley City Archers Inc.', 'VIC'),
('Moorabbin Archery Club', 'NSW'),
('Ironbark Archery Club', 'NSW'),
('Top End Targets', 'NSW'),
('Reefside Robin Hoods', 'NSW'),
('Archery Club', 'SA'),
('Aussie Bush Bullseyes', 'TAS'),
('Coral Cove Archers', 'TAS'),
('Kangaroo Point Archery Club', 'NSW'),
('Tuggeranong Archery Club', 'ACT'),
('Southlake Archers', 'ACT'),
('Queanbeyan Archery Club', 'ACT'),
('Canberra Archery Club - Kambah Field', 'ACT'),
('Weston Creek Archery Club', 'ACT'),
('Stromlo Forest Archery Club', 'ACT'),
('National Archery Association of Australia (NAAACT)', 'ACT'),
('Wanniassa Archery Club', 'ACT'),
('Northside Archery Club', 'ACT'),
('ANU Archery Club', 'ACT'),
('Belconnen Archery Club', 'ACT'),
('Gungahlin Archery Club', 'ACT'),
('Monaro Archers', 'ACT'),
('Goulburn Archery Club', 'ACT'),
('Bungendore Archery Club', 'ACT'),
('Hall Archery Club', 'ACT'),
('Molonglo Archery Club', 'ACT'),
('Sutton Archery Club', 'ACT'),
('Brindabella Bowmen', 'ACT'),
('Murrumbateman Archery Club', 'ACT'),
('Jerrabomberra Archery Club', 'ACT');

-- Insert statements for Archer table
INSERT INTO Archer (FirstName, LastName, DOB, Gender, ClubID) VALUES 
('John', "Joel", '1990-05-15', 'Male', 1),
('Emily', "Joel", '2002-08-21', 'Female', 2),
('Michael', "Joel", '1998-02-10', 'Male', 3);

-- Insert statements for RoundRecord table
INSERT INTO RoundRecord (`Date`, RoundID, Equipment, ArcherID) VALUES 
('2024-04-01', 1, 'Recurve', 1),
('2024-04-02', 2, 'Compound', 2),
('2024-04-03', 3, 'Traditional', 3);

-- Insert statements for Arrow table
INSERT INTO Arrow (RoundRecordID, PertainingEnd, Score) VALUES 
(1, 1, 10),
(1, 2, 10),
(1, 3, 10),
(1, 4, 10),
(1, 5, 10);

-- Insert statements for CompetitionDetails table
INSERT INTO CompetitionDetails (CompetitionID, RoundID, AgeGroup, Gender, Equipment) VALUES 
(1, 1, 'Open', 'Male', 'Recurve'),
(1, 1, 'Open', 'Male', 'Compound'),
(1, 1, 'Under 21', 'Male', 'Recurve'),
(1, 1, 'Under 21', 'Male', 'Compound');

-- Insert statements for CompetitionRecord table
INSERT INTO CompetitionRecord (RoundRecordID, CompetitionID) VALUES 
(1, 1),
(2, 1),
(3, 2);

INSERT INTO Championship (ClubID, CompetitionID) VALUES
(1, 1),
(2, 2),
(3, 3);

SET FOREIGN_KEY_CHECKS = 1;
