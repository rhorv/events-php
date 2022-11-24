<?php

$string = '{"category":"event","name":"partner_feed_build_finished","payload":{"content": "Amazon Delivery Station Warehouse AssociatePay rate: Up to $21.70Job OverviewYoull be part of the dedicated Amazon team at the delivery station  the last stop before we deliver smiles to customers. Our fast-paced, physical roles receive trucks full of orders, then prepare them for delivery. Youll load conveyor belts, and transport and stage deliveries to be picked up by drivers. You may even be part of the team that works with larger items, such as large screen TVs, furniture, and appliances, and be trained on how to use technology to handle these heavy bulk items.Duties & ResponsibilitiesSome of your duties may include:Receive and prepare inventory for deliveryUse technology like smartphones and handheld devices to sort, scan, and prepare ordersView prompts on screens and follow direction for some tasksBuild, wrap, sort, and transport pallets and packagesReceive truck deliveriesYoull also need to be able to:Lift up to 49 poundsStand, walk, push, pull, squat, bend, and reach during shiftsUse carts, dollies, hand trucks, and other gear to move items aroundGo up and down stairs (where applicable)Work at a height of up to 40 feet on a mezzanine (where applicable)What its like at an Amazon Delivery StationSafety. Your safety is important to us, so we provide protective gear. All teams share safety tips daily.Surroundings. Youll be working around moving machines  order pickers, stand-up forklifts, turret trucks, and mobile carts.Activity. Some activities may require standing in one place for long periods, walking around, or climbing stairs.Temperature. Even with climate controls, temperatures can vary between 60F and 90F in some parts of the warehouse; on hot days, temperatures can be over 90F in the truck yard or inside trailers.Noise level. It can get noisy at times. We provide hearing protection if you need it.Dress code. Relaxed, with a few rules to follow for safety. Comfortable, closed-toe shoes are required. Depending on the role or location, Amazon provides a $110 Zappos gift code towards the purchase of shoes, in order to have you prepared for your first day on the job.Why Youll Love this JobStay busy. You and your team are engaged the entire shift.Schedule options. Depending on where you work, schedules may include full-time (40 hours), reduced-time (30-36 hours) or part-time (20 hours or less), all with the option of working additional hours if needed.Shift flexibility. Work when it works for you. Shifts may include overnight, early morning, day, evening, and weekend. You can even have four-day workweeks, three-day weekends  and with Anytime Shifts, you can work as little as four hours per week.Anytime Pay. You can instantly cash out up to 70% of your earnings immediately after your shift (for select employee groups, within select businesses). Learn more about Anytime Pay.Career advancement. We have made a pledge to upskill our employees and offer a variety of free training and development programs, and we also have tuition support options for select employee groups. See where your Amazon journey can take you.New skills. Depending on the role and location, youll learn how to use the latest Amazon technology  including handheld devices and robotics.Team environment. Work on small or large teams that support each other.Why Youll Love Amazon Many of our jobs come with great benefits  including healthcare, parental leave, ways to save for the future, and opportunities for career advancement  all in a safe and inclusive environment thats been ranked among the best workplaces in the world. Some offerings are dependent upon the role, work schedule, or location, and can include the following:Competitive wage paid weekly, with overtime for more than 40 hoursHealthcare (medical, dental, vision, prescription drugs)Medical Advice LineNetwork of Support (health & well-being on and off the job)Adoption AssistanceMaternity and Parental Leave401(k) savings planPaid Time Off (PTO)Holiday pay opportunitiesEmployee discountsBasic life insuranceAD& D insuranceCompany-paid Short-Term and Long-Term DisabilityOn-the-job training and skills developmentEmployee Assistance ProgramLearn more about Amazon Benefits and Culturehttps://hiring.Amazon.Com/why-amazon/benefits#/https://hiring.Amazon.Com/why-amazon/culture#/Requirements:Candidates must be 18 years or older with the ability to understand and adhere to all job requirement and safety guidelines.How To Get StartedYou can begin by applying below. If you need help with your application or to learn more about our hiring process, you can find support here: https://hiring.Amazon.Com/hiring-process#/.Amazon is committed to a diverse and inclusive workplace. Amazon is an equal opportunity employer and does not discriminate on the basis of race, national origin, gender, gender identity, sexual orientation, protected veteran status, disability, age, or other legally protected status. For individuals with disabilities who would like to request an accommodation, please visit https://hiring.Amazon.Com/people-with-disabilities/. PandoLogic. Keywords: Warehouse Worker, Location: Edmonds, WA 98020", "process_id":"211209180002","partner_id":"cvbrowser","file":{"type":"s3","config":{"region":"eu-west-1","bucket_name":"brilliantjobs-live-partner","filename":"partner_feeds\/cvbrowser\/feed.xml"}},"build_stats":{"jobs_count":0,"max_cpc":0,"min_cpc":1000,"avg_cpc":0,"start_time":"2021-12-09T20:11:45+00:00","finish_time":"2021-12-09T20:11:45+00:00"}},"occurred_at":"2021-12-09T20:11:46+00:00","id":"aabe7658-b8f3-4f95-be18-1d8bf56f7d3b","schema_version":1,"version":"1","meta":{"origin":{"context_name":"brilliant-builder"}}}';
echo sprintf("Original size: %d, compressed size: %d, compressed+base64 size: %d\n", strlen($string), strlen(gzencode($string, 1)), strlen(base64_encode(gzencode($string))));